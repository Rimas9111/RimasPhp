// $(document).ready(function(){
//     $("button").click(function(){
//         $.post("text.txt",
        
//         // {
//         //   name: "$_POST[name]",
//         //   surname: "$_POST[surname]",
//         //   email: "$_POST[email]"
//         // },

//         function(data,status,){
//             alert("Data: " + data + "\nStatus: " + status);
//         });
//     });
// });

// $(document).ready(function(){
//     $("button").click(function(){
//         var name = $('#name');
//         var surname = $('#surname');
//         var email = $('#email');
        
//         function(data,status,name,surname,email){
//             alert("Data: " + data + "\n" + name + "\n" + surname + "\n" + email + "\nStatus: " + status);
//         };
//     });
// });


// function showHint(str) {j
//   var xhttp;
//   if (str.length == 0) { 
//     document.getElementById("txtHint").innerHTML = "";
//     return;
//   }
//   xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       document.getElementById("txtHint").innerHTML = this.responseText;
//     }
//   };
//   xhttp.open("GET", "gethint.php?q="+str, true);
//   xhttp.send();   
// }
// document.getElementById("submit").addEventListener("click", function(){
//   alert("Vardas: " );
// });

function postAjax(url, data, success) {
  var params = typeof data == 'string' ? data : Object.keys(data).map(
          function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
      ).join('&');

  var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
  xhr.open('POST', url);
  xhr.onreadystatechange = function() {
      if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }
  };
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send(params);
  return xhr;
}

function serialize(form) {
  var field, l, s = [];
  if (typeof form == 'object' && form.nodeName == "FORM") {
      var len = form.elements.length;
      for (var i=0; i<len; i++) {
          field = form.elements[i];
          if (field.name && !field.disabled && field.type != 'file' && field.type != 'reset' && field.type != 'submit' && field.type != 'button') {
              if (field.type == 'select-multiple') {
                  l = form.elements[i].options.length; 
                  for (var j=0; j<l; j++) {
                      if(field.options[j].selected)
                          s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[j].value);
                  }
              } else if ((field.type != 'checkbox' && field.type != 'radio') || field.checked) {
                  s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value);
              }
          }
      }
  }
  return s.join('&').replace(/%20/g, '+');
}

document.getElementById("submit").addEventListener("click", function(){
  alert("Vardas: ");
});