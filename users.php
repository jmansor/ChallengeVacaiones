<?php
 require_once("functions.php");

//var_dump($_SESSION);
 if (!isLogued()) {
   header('location: login.php');
   exit;
  	}

?>
<html>
  <head>
    <meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="html/css/style.css">

    <title>USERS</title>
  </head>
  <body>
<?php include("nav.php") ?>


<div class="d-flex  justify-content-around">
	<div class="row  justify-content-around ">
        <div class="panel panel-default user_panel">
            <div class="panel-heading">
                <h3 class="panel-title">Users</h3>
            </div>
            <div class="panel-body">
				<div class="table-container">
                    <table class="table-users table" border="0">
                        <tbody>
                            <tr>
                                <!-- <td width="10" align="center">
                                    <i class="fa fa-2x fa-user fw"></i>
                                </td>
                                <td>
                                     John Smith<br><i class="fa fa-envelope"></i>
                                </td>
                                <td>
                                    Builder Admin
                                </td>
                                <td align="center">
                                    Last Login:  6/14/2017<br><small class="text-muted">2 days ago</small>
                                </td>
                            </tr> -->
                            <tr>
                              <td width="10">
                                  <img class="pull-left img-circle nav-user-photo" width="50" src="html/images/moderator-male.png" />  
                              </td>
                              <td>
                                  Herbert Hoover<br><i class="fa fa-envelope"></i>
                              </td>
                              <td>
                                  Builder Sales Agent
                              </td>
                              <td align="center">
                                  Last Login:  6/10/2017<br><small class="text-muted">5 days ago</small>
                              </td>

                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

	</div>
</div>

  </body>

</html>
