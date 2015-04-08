/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 $(function() {
        CKEDITOR.disableAutoInline = false;
        $(document).ready(function() {
            $('#editor1').ckeditor(); // Use CKEDITOR.replace() if element is <textarea>.
//            $('#editable').ckeditor(); // Use CKEDITOR.inline().
            
            $("#formPortfolio").validate({
                submitHandler: function(form) {
                    portfolioSave($("#formPortfolio").serialize());


                }
            });
        });

        function setValue() {
            // $('#editor1').val($('input#val').val());
        }

        
    });