(function(){

window.$app = {

    HomeController :function(){
        function run() {
            fetchFeed();
            setInterval(fetchFeed, 5000);
        };

        function fetchFeed() {
            $.getJSON("/posts").done(function(res){
                /* render */
                var items = res.data;
                // console.log(res);
                $("#postList").html(_.template($("#postTemplate").html(),{items:items}));
            });
        }

        return {run: run}
    },


    UserController :function(){
        function run() {
            //binding
            $('#loginButton').click(login);
            $('#postButton').click(add_post);
        };

        function login () {
            $.post("/login", $( "#loginForm" ).serialize())
                .done(function(res) {
                    if (parseInt(res.error)==0) {
                        $( "#loginPanel" ).hide();
                        $( "#postPanel" ).show();
                        $( "#postBody" ).focus();
                        $( "#userName" ).text(res.data);
                    }
                    _feedback(res);
                })
                .fail(function() {
                    _feedback({error:1, message:"fail"});
                });
        }

        function add_post () {
            $.post("/posts", $( "#postForm" ).serialize())
                .done(function(res) {
                    console.log(res);
                    if (parseInt(res.error)==0) {
                        $( "#postBody" ).val("").focus();
                    }
                    _feedback(res);
                })
                .fail(function() {
                    _feedback({error:1, message:"fail"});
                });
        }

        function _feedback(res) {
            console.debug(res);
            if (res) {
                if (parseInt(res.error)==0) {
                    $('#successPanel .msg').text(res.message);
                    $('#successPanel').fadeIn(1000, function(){
                        $(this).fadeOut(3000);
                    });
                } else {
                    $('#warningPanel .msg').text(res.message);
                    $('#warningPanel').fadeIn(1000, function(){
                        $(this).fadeOut(3000);
                    });
                }
            }
        }

        return {run: run}
    }
};
    
})();
