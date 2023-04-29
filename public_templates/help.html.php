
 <div class="outter-help"> <!-- Code section from https://www.w3schools.com/howto/howto_js_collapsible.asp -->
    <h2>FetchCar Help</h2>
    <button class="collapsible">Creating Account</button> 
    <div class="content">
        <p>To create an account please click register at the top right corner.</p>
        <p>You must be over 18s.</p>
    </div>

    <button class="collapsible">Loggin in</button>
    <div class="content">
        <p>Enter the email you have registered with</p>
        <p>Enter the password you have registered with</p>
    </div>

    <button class="collapsible">Adding a Car</button>
    <div class="content">
        <p>Go to the Rent a Car Page. </p>
        <p>Click on List Vehicle button</p>
        <p>Fillout all the required details</p>
        <p>Done!</p>
    </div>

    <button class="collapsible">Adding Route Posts</button>
    <div class="content">
        <p>Go to the Cehck Routes Page. </p>
        <p>Click on List Vehicle button</p>
        <p>Fillout all the required details</p>
        <p>Done!</p>
    </div>

    <button class="collapsible">Contact Us</button>
    <div class="content">
        <p>Enter your name</p>
        <p>Enter your Email</p>
        <p>Enter the problem you need to be helped with</p>
    </div>
</div>


<script>
var coll = document.getElementsByClassName("collapsible"); // Code section from https://www.w3schools.com/howto/howto_js_collapsible.asp  
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>