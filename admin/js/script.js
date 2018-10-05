//chose bulk

$(document).ready(function() {
// alert ("ádasd");
    $('#selectAllBoxes').click(function (event) {
       if(this.checked) {
           $('.checkbox').each(function () {
               this.checked=true;
               });      
        }else{
            $('.checkbox').each(function() {
               this.checked = false;
                });      
            }   
        });
    
});

