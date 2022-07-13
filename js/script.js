// console.log("something");
function validateInput(){
    //get the values(from HTML in java script )
    let name_element=document.getElementById('full-name');
    let name_label=document.getElementById('label-full-name');
    let name = name_element.value;

    let phone_element = document.getElementById('phone');
    let phone_label = document.getElementById('label-phone');
    let phone = phone_element.value;

    let github_element = document.getElementById('github');
    let github_label = document.getElementById('label-github');
    let github = github_element.value;

    console.log("name is: "+name+", phone is : "+phone+",github is: "+github );
    const name_regex = new RegExp("^[a-zA-Z\s ']+$");
    const phone_regex= /^0[1-9]{9}/;
    const github_regex=/^[a-zA-Z_\-]+$/;

   // console.log( name_rejex.test("Wambua Ng'ang'a") );
   // console.log( phone_rejex.test("0778458619") );
    //console.log( github_rejex.test("kamau-jo-") );
 
    //test whether what the user has written is inline 
      //if values do not confrim to the formart      
    validateHelper(name_element, name_label, name_regex,name,"The name must contain only alphabets and spaces");
    validateHelper(phone_element, phone_label, phone_regex,phone,"The phone number (digits only) should be in the formart OPPJJWWBBB");
    validateHelper(github_element, github_label, github_regex,github,"The github usename formart should only contain letters,_ and - eg octo-cat");

}

function validateHelper(element, element_label, element_regex,element_value,error_message){
    if( element_value != "" && element_regex.test(element_value)== false){
        //delete that value
        element.value="";
        //display error message to usser
        //alert("The name contain only alphabets and spaces e.g John Doe ");
        element.classList.add("error");
        element_label.classList.add("error");

        element.setCustomValidity(error_message);
        element.reportValidity();

    }else{
        element.classList.remove("error");
        element_label.classList.remove("error");
        element.setCustomValidity("");
    }


}