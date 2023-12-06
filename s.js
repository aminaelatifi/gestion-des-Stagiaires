document.getElementById('selection').addEventListener('change',function()){
   var selecyOption=this.options[this.selectedIndex].value;
   var nvfiliere=document.getElementById('nvfilier');
   if (selecyOption === 'autre'){
    nvfiliere.style.display='table-cell';
   }else{
    nvfiliere.style.display='none';
   }
}