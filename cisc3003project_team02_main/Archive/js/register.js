function main(){
    var but = document.querySelectorAll('.required hilightable');
    for(var i = 0;i<but.length;i++){
    const u = i;
    but[u].addEventListener("focus",
          function(e){
             but[u].classList.toggle('highlight');
          }
       );
       but[u].addEventListener("blur",
          function(e){
             but[u].classList.toggle('highlight');
          }
       );
       but[u].addEventListener("change",
          function(e){
             if(!isEmpty(but[u].value)){
                but[u].classList.remove('error');
             }
          }
       );
    }
    var but2 = document.querySelectorAll('.hilightable');
    for(var i = 0;i<but2.length;i++){
    const u = i;
    but2[u].addEventListener("focus",
          function(e){
             but2[u].classList.toggle('highlight');
          }
       );
       but2[u].addEventListener("blur",
          function(e){
             but2[u].classList.toggle('highlight');
          }
       );
       but2[u].addEventListener("change",
          function(e){
             if(!isEmpty(but2[u].value)){
                but2[u].classList.remove('error');
             }
          }
       );
    }
}

               function isEmpty(str){
                  return !str.trim().length;
               }
               
               function check(){
                var a = document.querySelector('button[type=submit]');
                a.addEventListener('click',function(e){
                   var b = document.querySelectorAll('.hilightable');
                   var c = document.querySelectorAll('.hilightable required');
                   var ver = true;
                   for(var i =0;i<b.length;i++){
                      const u = i;
                      if(isEmpty(b[u].value)){
                         b[u].classList.add('error');
                         ver = false;
                      }
                   }
                   for(var i =0;i<c.length;i++){
                      const u = i;
                      if(isEmpty(c[u].value)){
                         c[u].classList.add('error');
                         ver = false;
                      }
                   }
                   var a = document.querySelector('input[type="captcha"]').value;
                   var b = document.querySelector('input[type="button"]').value;
                   if(a != b || b.length != 4){
                      ver = false;
                   }
                   if(!ver){
                     alert("sign-up fail");
                      e.preventDefault();
                      
                   }
                })
               }
               function myFunction() {
                  var x = document.getElementById("myInput");
                  if (x.type === "password") {
                    x.type = "text";
                  } else {
                    x.type = "password";
                  }
                }