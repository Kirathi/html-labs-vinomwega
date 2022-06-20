//console.log("something");
function validateInput(){

    let name = document.getElementById('full_name').value;
    let phone = document.getElementById('phone').value;
    let github = document.getElementById('github').value;

    console.log("name is: "+name+", phone is : "+phone+",github is: "+github );
    const name_rejex = new RegExp("[a-zA-Z/s']");
    console.log( name_rejex.test("9123719731"));
 
    




}