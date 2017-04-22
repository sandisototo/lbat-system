angular.module('starterApp', ['login','helper','getter','admin']).run(function($log){
        $log.debug("MyApp is ready!");
      })
      .service("SharedProperties", function () {
        var enviroment = "dev";
        var url_link   = {};
        if(enviroment === "dev"){

          url_link   = { link: "http://localhost/lbat/"};

        }else{
          url_link  =  { link:"http://fintechrewards.co.za/"};

        }

         return url_link;
});
