<?php

function query($pdo, $sql, $parameters = []) {
	$query = $pdo->prepare($sql);
	$query->execute($parameters);
	return $query;
}

function allMembers($pdo) {
	$members = query($pdo, 'SELECT * FROM members');
	return $members->fetchAll();
}

function addMember($pdo, $f_name, $l_name, $email, $phone, $password, $dvla) {
	$query = ("INSERT INTO members (first_name, last_name, email, password, phone_number, DVLA_code) 
	VALUES (:first_name, :last_namee, :email, :phone_number, :password, :dvla)");

	$parameters = [':first_name' => $f_name, ':last_namee' => $l_name, ':email' => $email, ':password' => $password,
	':phone_number' => $phone, ':dvla' => $dvla];

    query($pdo, $query, $parameters);
}

function getEmail($pdo, $email) {
    $query = $pdo->prepare("SELECT * FROM members WHERE email =?");
    $query->execute([$email]);
    $result = $query->fetch();
	return $result;
}

function selectFromReset($pdo, $email){
	$query = $pdo->prepare("SELECT * FROM reset_password WHERE email =?");
    $query->execute([$email]);
    $result = $query->fetch();
	return $result;
}

function insertIntoReset($pdo, $email, $code){
	$query = ("INSERT INTO reset_password (email, code) 
	VALUES (:email, :code)");
	$parameters = [':email' => $email, ':code' => $code];
    query($pdo, $query, $parameters);
}

function updateReset($pdo, $email, $code) {
	$query = "UPDATE reset_password SET code = :code WHERE email = :email";
	$parameters = [':email' => $email, ':code' => $code];
    query($pdo, $query, $parameters);
}

function deleteReset($pdo, $email, $code) {
	$query = "UPDATE reset_password SET code = :code WHERE email = :email";
	$parameters = [':email' => $email, ':code' => $code];
    query($pdo, $query, $parameters);
}

function updatePassword($pdo, $email, $password){
	$query = "UPDATE members SET password = :password WHERE email = :email";
	$parameters = [':email' => $email, ':password' => $password];
    query($pdo, $query, $parameters);
}

function allMakes($pdo) {
	$makes = query($pdo, 'SELECT * FROM vehicle_make');
	return $makes->fetchAll();
}

function allVehicleTypes($pdo) {
	$makes = query($pdo, 'SELECT * FROM vehicle_type');
	return $makes->fetchAll();
}
////////////////////////////////
/// Vehicle types 
////////////////////////////////
function allVehicles($pdo){
	$vehicles = query($pdo, 'SELECT * FROM vehicle
	INNER JOIN vehicle_make ON vehicle.vehicle_make_id = vehicle_make.id
	INNER JOIN vehicle_type ON vehicle.vehicle_type_id = vehicle_type.type_id
	INNER JOIN members ON vehicle.member_id = members.id');
	return $vehicles->fetchAll();
}

function allSedan($pdo){
	$vehicles = query($pdo, 'SELECT * FROM vehicle
	INNER JOIN vehicle_make ON vehicle.vehicle_make_id = vehicle_make.id
	INNER JOIN vehicle_type ON vehicle.vehicle_type_id = vehicle_type.type_id
	INNER JOIN members ON vehicle.member_id = members.id WHERE vehicle_type_id = 1');
	return $vehicles->fetchAll();
}

function allWagons($pdo){
	$vehicles = query($pdo, 'SELECT * FROM vehicle
	INNER JOIN vehicle_make ON vehicle.vehicle_make_id = vehicle_make.id
	INNER JOIN vehicle_type ON vehicle.vehicle_type_id = vehicle_type.type_id
	INNER JOIN members ON vehicle.member_id = members.id WHERE vehicle_type_id = 2');
	return $vehicles->fetchAll();
}

function allHatchback($pdo){
	$vehicles = query($pdo, 'SELECT * FROM vehicle
	INNER JOIN vehicle_make ON vehicle.vehicle_make_id = vehicle_make.id
	INNER JOIN vehicle_type ON vehicle.vehicle_type_id = vehicle_type.type_id
	INNER JOIN members ON vehicle.member_id = members.id WHERE vehicle_type_id = 3');
	return $vehicles->fetchAll();
}

function allSUV($pdo){
	$vehicles = query($pdo, 'SELECT * FROM vehicle
	INNER JOIN vehicle_make ON vehicle.vehicle_make_id = vehicle_make.id
	INNER JOIN vehicle_type ON vehicle.vehicle_type_id = vehicle_type.type_id
	INNER JOIN members ON vehicle.member_id = members.id WHERE vehicle_type_id = 4');
	return $vehicles->fetchAll();
}

function allMinivan($pdo){
	$vehicles = query($pdo, 'SELECT * FROM vehicle
	INNER JOIN vehicle_make ON vehicle.vehicle_make_id = vehicle_make.id
	INNER JOIN vehicle_type ON vehicle.vehicle_type_id = vehicle_type.type_id
	INNER JOIN members ON vehicle.member_id = members.id WHERE vehicle_type_id = 5');
	return $vehicles->fetchAll();
}

function allVan($pdo){
	$vehicles = query($pdo, 'SELECT * FROM vehicle
	INNER JOIN vehicle_make ON vehicle.vehicle_make_id = vehicle_make.id
	INNER JOIN vehicle_type ON vehicle.vehicle_type_id = vehicle_type.type_id
	INNER JOIN members ON vehicle.member_id = members.id WHERE vehicle_type_id = 6');
	return $vehicles->fetchAll();
}

function allElectric($pdo){
	$vehicles = query($pdo, "SELECT * FROM vehicle
	INNER JOIN vehicle_make ON vehicle.vehicle_make_id = vehicle_make.id
	INNER JOIN vehicle_type ON vehicle.vehicle_type_id = vehicle_type.type_id
	INNER JOIN members ON vehicle.member_id = members.id WHERE fuel_type = 'Electric'");
	return $vehicles->fetchAll();
}

function randomString($n){
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$str = '';
	for ($i = 0; $i < $n; $i++) {
		$index = rand(0, strlen($characters) - 1);
		$str .= $characters[$index];
	}
	return $str;
}

function getByVehicle($pdo, $id) {
	$parameters = [':id' => $id];
	$query = query($pdo, 'SELECT * FROM vehicle WHERE vId = :id', $parameters);
	return $query->fetch();
}

function insertVehicle($pdo, $vehicle_make_id, $model, $engine_size, $fuel_type, $year,
	$transmission, $keyless, $doors, $price_min, $price_h, $price_day, $price_mile, 
	$vehicle_location, $vehicle_type_id, $member_id, $image)
	{
		if(!is_dir('/images')){
			mkdir('/images');
		}
		
		$image = $_FILES['image'] ?? null;
		$imagePath = '';
	
		if ($image && $image['tmp_name']){
	
			if($image['image']){
				unlink('images/' . randomString(8) . '/' . $image['image']);
			}

			$imagePath = 'images/' .  randomString(8) . '/' . $image['name'];
			mkdir(dirname($imagePath));
			move_uploaded_file($image['tmp_name'], $imagePath);
		}
	
	$query = ('INSERT INTO vehicle (vehicle_make_id, model, engine_size, fuel_type, year,
	transmission, keyless, doors, price_min, price_h, price_day, price_mile, vehicle_location, vehicle_type_id, member_id, image)
	VALUES (:vehicle_make_id, :model, :engine_size, :fuel_type, :year,:transmission, :keyless, :doors, :price_min, 
	:price_h, :price_day, :price_mile, :vehicle_location, :vehicle_type_id, :member_id, :image)');

	$parameters = [':vehicle_make_id' => $vehicle_make_id, ':model' => $model,
	':engine_size' => $engine_size, ':fuel_type' => $fuel_type, ':year' => $year, ':transmission' => $transmission, 
	':keyless' => $keyless, ':doors' => $doors, ':price_min' => $price_min, ':price_h' => $price_h, ':vehicle_location' => $vehicle_location,
	':price_day' => $price_day, ':price_mile' => $price_mile,':vehicle_type_id' => $vehicle_type_id, ':member_id' => $member_id, ':image' => $imagePath];

	query($pdo, $query, $parameters);	
}

function updateVehicle($pdo, $vId, $vehicle_make_id, $model, $engine_size, $fuel_type, $year,
	$transmission, $keyless, $doors, $price_min, $price_h, $price_day, $price_mile, 
	$vehicle_location, $vehicle_type_id, $member_id, $image)
	{
		if(!is_dir('/images')){
			mkdir('/images');
		}
		
		$image = $_FILES['image'] ?? null;
		$imagePath = '';
	
		if ($image && $image['tmp_name']){
	
			if($image['image']){
				unlink('images/' . randomString(8) . '/' . $image['image']);
			}

			$imagePath = 'images/' .  randomString(8) . '/' . $image['name'];
			mkdir(dirname($imagePath));
			move_uploaded_file($image['tmp_name'], $imagePath);
		}
	
	$query = 'UPDATE vehicle SET vehicle_make_id = :vehicle_make_id, model = :model, engine_size = :engine_size, fuel_type = :fuel_type, 
	year = :year, transmission = :transmission, keyless = :keyless, doors = :doors, price_min = :price_min, price_h = :price_h, 
	price_day = :price_day, price_mile = :price_mile, vehicle_location = :vehicle_location, vehicle_type_id = :vehicle_type_id,
	member_id = :member_id, image = :image WHERE vId = :vId';

	$parameters = [':vehicle_make_id' => $vehicle_make_id, ':model' => $model,':engine_size' => $engine_size, ':fuel_type' => $fuel_type, 
	':year' => $year, ':transmission' => $transmission, ':keyless' => $keyless, ':doors' => $doors, ':price_min' => $price_min, 
	':price_h' => $price_h, ':vehicle_location' => $vehicle_location, ':price_day' => $price_day, ':price_mile' => $price_mile,
	':vehicle_type_id' => $vehicle_type_id, ':member_id' => $member_id, ':image' => $imagePath, ':vId' => $vId];

	query($pdo, $query, $parameters);	
}

function deleteCar($pdo, $id) {
	$parameters = [':id' => $id];
	query($pdo, 'DELETE FROM vehicle WHERE vId = :id', $parameters);
}

function deletePost($pdo, $id) {
	$parameters = [':id' => $id];
	query($pdo, 'DELETE FROM route_posts WHERE post_id = :id', $parameters);
}

function deleteReview($pdo, $id) {
	$parameters = [':id' => $id];
	query($pdo, 'DELETE FROM car_review WHERE rId = :id', $parameters);
}

function deleteComment($pdo, $id) {
	$parameters = [':id' => $id];
	query($pdo, 'DELETE FROM route_comments WHERE comment_id = :id', $parameters);
}

function getCar($pdo, $id) {
	$parameters = [':id' => $id];
	$query = query($pdo, 'SELECT * FROM vehicle 
	INNER JOIN vehicle_make ON vehicle.vehicle_make_id = vehicle_make.id
	INNER JOIN vehicle_type ON vehicle.vehicle_type_id = vehicle_type.type_id
	INNER JOIN members ON vehicle.member_id = members.id 
	WHERE vId = :id', $parameters);
	return $query->fetch();
}

function getReviewByCar($pdo, $id) {
	$parameters = [':vId' => $id];
	$query = query($pdo, 'SELECT * FROM car_review
	INNER JOIN vehicle ON car_review.vehicle_id = vehicle.vId
	INNER JOIN members ON car_review.member_review_id = members.id
	WHERE vehicle_id = :vId', $parameters);
	return $query->fetchAll(PDO::FETCH_ASSOC);
}

function insertReview($pdo, $review, $vehicle_id, $member_id) {
	$query = ('INSERT INTO car_review (review, vehicle_id, member_review_id)
	VALUES (:review, :vehicle_id, :member_id)');
	$parameters = [':review' => $review, ':vehicle_id' => $vehicle_id, ':member_id' => $member_id];
	query($pdo, $query, $parameters);
}

function insertComment($pdo, $comment, $member_id, $rout_id) {
	$query = ('INSERT INTO route_comments (comment, member_id, rout_id)
	VALUES (:comment, :member_id, :route_id)');
	$parameters = [':comment' => $comment, ':member_id' => $member_id,':route_id' => $rout_id];
	query($pdo, $query, $parameters);
}

function getByPost($pdo, $id) {
	$parameters = [':id' => $id];
	$query = query($pdo, 'SELECT * FROM route_posts WHERE post_id = :id', $parameters);
	return $query->fetch();
}

function getPostByComment($pdo, $id) {
	$parameters = [':id' => $id];
	$query = query($pdo, 'SELECT * FROM route_comments
	INNER JOIN members ON route_comments.member_id = members.id
	WHERE rout_id = :id', $parameters);
	return $query->fetchAll(PDO::FETCH_ASSOC);
}

function insertBooking($pdo, $order_number, $date_created, $reserved_date, $reserved_time, $vehicle_id, $member_id){
	$query = ("INSERT INTO transactions (order_number, created, car_date, car_time, vehicle_id, member_id) 
	VALUES (:order_number, :created, :car_date, :car_time, :vehicle_id, :member_id)");
	
	$parameters = [':order_number' => $order_number, ':created' => $date_created,':car_date' => $reserved_date, 
	':car_time' => $reserved_time, ':vehicle_id' => $vehicle_id, ':member_id' => $member_id];
	query($pdo, $query, $parameters);
}

function insertPost($pdo, $going_from, $going_to, $post_message, $date_posted, $image, $member_id)
	{
		if(!is_dir('/images')){
			mkdir('/images');
		}
		
		$image = $_FILES['image'] ?? null;
		$imagePath = '';
	
		if ($image && $image['tmp_name']){
	
			if($image['image']){
				unlink('images/' . randomString(8) . '/' . $image['image']);
			}

			$imagePath = 'images/' .  randomString(8) . '/' . $image['name'];
			mkdir(dirname($imagePath));
			move_uploaded_file($image['tmp_name'], $imagePath);
		}
	
	$query = ("INSERT INTO route_posts (going_from, going_to, post_message, date_posted, image, member_id) VAlUES
	(:going_from, :going_to, :post_message, :date_posted, :image, :member_id)");

	$parameters = [':going_from' => $going_from, ':going_to' => $going_to, 
	':post_message' => $post_message, ':date_posted' => $date_posted, ':image' => $imagePath, ':member_id' => $member_id];

	query($pdo, $query, $parameters);	
}

function updatePost($pdo, $post_id, $going_from, $going_to, $post_message, $date_posted, $image)
	{
		if(!is_dir('/images')){
			mkdir('/images');
		}
		
		$image = $_FILES['image'] ?? null;
		$imagePath = '';
	
		if ($image && $image['tmp_name']){
	
			if($image['image']){
				unlink('images/' . randomString(8) . '/' . $image['image']);
			}

			$imagePath = 'images/' .  randomString(8) . '/' . $image['name'];
			mkdir(dirname($imagePath));
			move_uploaded_file($image['tmp_name'], $imagePath);
		}
	
	$query = "UPDATE route_posts SET going_from = :going_from, going_to = :going_to,
	post_message = :post_message, date_posted = :date_posted, image = :image 
	WHERE post_id = :post_id";

	$parameters = [':post_id' => $post_id, ':going_from' => $going_from, ':going_to' => $going_to, 
	':post_message' => $post_message, ':date_posted' => $date_posted, ':image' => $imagePath];

	query($pdo, $query, $parameters);	
}

function allPosts($pdo) {
	$makes = query($pdo, 'SELECT * FROM route_posts
	INNER JOIN members ON route_posts.member_id = members.id');
	return $makes->fetchAll();
}

function getAnswerByPost($pdo, $id) {
	$parameters = [':id' => $id];
	$query = query($pdo, 'SELECT * FROM car_review
	INNER JOIN members ON route_posts.member_id = members.id
	WHERE member_id = :id', $parameters);
	return $query->fetchAll(PDO::FETCH_ASSOC);
}