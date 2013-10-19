function get(variable)
{
   var query = window.location.search.substring(1);
   var vars = query.split("&");
   for (var i=0;i<vars.length;i++) {
           var pair = vars[i].split("=");
           if(pair[0] == variable){return pair[1];}
   }
   return(false);
}

function addClass(id,new_class)
{
       var i,n = 0;
       new_class = new_class.split(",");

       for (i = 0; i < new_class.length; i++) {
         if((" "+document.getElementById(id).className+" ").indexOf(" "+new_class[i]+" ")==-1){
               document.getElementById(id).className+=" "+new_class[i];
               n++;
         }
       }

       return n;
}
