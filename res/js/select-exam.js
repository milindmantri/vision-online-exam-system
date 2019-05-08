var request = new XMLHttpRequest();
request.open("GET", "./res/data/subjects.json", false);
request.send(null)
var obj = JSON.parse(request.responseText);


let subject_list = Object.keys(obj["subjects"]);
//console.log(subject_list);
let add_select_subject = document.getElementById("select-subject");
for(var i in subject_list) {
    add_select_subject.add(new Option(subject_list[i]));
}

/*Update the test when the subjects are selected*/
function updateTest(){
    var selected_subject = document.getElementById("select-subject");
    let test_list = obj["subjects"][selected_subject.value];
    let add_test_subject = document.getElementById("select-test");
    var length = add_test_subject.options.length;
    for(i = length - 1 ; i >= 0 ; i--)  {
        add_test_subject.remove(i);
    }
    for(var i in test_list) {
        add_test_subject.add(new Option(test_list[i]));
    }
  // display value property of select list (from selected option)
}

updateTest();


function displayProfile(name,email,phone,accountType){
    document.getElementById("display-name").innerHTML=name;
    document.getElementById("display-email").innerHTML=email;
    document.getElementById("display-phone").innerHTML=phone;
    document.getElementById("display-account-type").innerHTML=accountType;
}
