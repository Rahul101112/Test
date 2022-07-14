<?php
  define("LOCAL_ENVIROMENT" ,true );
  if(constant("LOCAL_ENVIROMENT") === true){

    define("HOST_NAME" , "localhost" );
    define("DB_USER" , "root"  );
    define("DB_PASSWORD", "" );
    define("DB_NAME", "test");
    define("SERVER_NAME", "localhost");
    define("PUBLIC_PATH","C:/xampp/htdocs/Nukepin_projects/AI Institute/AI");
  }
  else{
    define("HOST_NAME" , "nukepin.in" );
    define("DB_USER" , "nukepin_ai_study"  );
    define("DB_PASSWORD", "nukepin_ai@study" );
    define("DB_NAME", "nukepin_ai");
    define("SERVER_NAME", "nukepin.in");
  }
