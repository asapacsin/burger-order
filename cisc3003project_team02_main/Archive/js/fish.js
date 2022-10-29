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
         alert("invalid user");
          e.preventDefault();
          
       }
    })
   }