(function($) {
    const url = {
        friend_threads_all_funcs: "include/friend_threads.php",
    };

    var friend_threads_page = {
        init: function(){
            this.get_friend_feed(url.friend_threads_all_funcs);
        },

        get_friend_feed: function(friend_threads_url) {
            $.ajax({
                    url: friend_threads_url,
                    method: 'POST',
                    data: {
                        action: 'fetch'
                    },
                    success: function (res) {
                        res = JSON.parse(res);
                        var bt = baidu.template;
                        var html_content = bt('msgTpl', res);
                        $('#msgTplContainer').html(html_content);
                    },
                    error: function(){
                        alert('HTTP request error!');
                    }
                }
            );

        },

    };

    $(function () {
            friend_threads_page.init();
        }
    );
})(window.jQuery);