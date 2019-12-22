jQuery.noConflict();
(
    function($) {
        var url = {
            fetch_profile: 'include/userprofile_process.php',
            update_profile: 'include/userprofile_process.php'
        };

        $(document).ready(function(){
            $.ajax({
                url: url.fetch_profile,
                method: 'post',
                data: {action: 'fetch'},
                // dataType: 'json',
            }).done(function(res){
                var values = JSON.parse(res);
                document.getElementById("nicknameinput").value = values.unickname;
                document.getElementById("self_introduction").value = values.self_introduction;
                document.getElementById("family_introduction").value = values.family_introduction;
            }).fail(function(){
                alert("fail");
            });
        });

        $("#form").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: url.update_profile,
                type: 'post',
                data:{
                    action: 'update',
                    unickname: document.getElementById("nicknameinput").value,
                    self_introduction: document.getElementById("self_introduction").value,
                    family_introduction: document.getElementById("family_introduction").value
                }
            }).done(function(){
                alert("You have updated your profile!");
            }).fail(function(){
                alert("Failed to update your profile!");
            });
        });
    }
)(jQuery);