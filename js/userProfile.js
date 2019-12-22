jQuery.noConflict();
(
    function($) {
        var url = {
            fetch_profile: 'include/userprofile_process.php',
            update_profile: 'include/userprofile_process.php',

        };

        $(document).ready(function(){
            initProfile();
        });

        function initProfile () {
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
                $('.avatar').find('img').attr('src', values.photo_link);
            }).fail(function(){
                alert("fail");
            });
        }

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

        // upload avatar
        $('#uploadAvatar').click(function (e) {
            e.preventDefault();
            $('#uploadInput').trigger('click');
        });

        $('#uploadInput').change(function () {
            formdata = new FormData();

            if ($(this).prop('files').length > 0) {
                file = $(this).prop('files')[0];
                formdata.append("avatar", file);
                formdata.append("action", "uploadAvatar");
            }

            $.ajax({
                url: url.update_profile,
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(res) {
                    initProfile();
                }
            });
        });

    }
)(jQuery);