<!DOCTYPE html>
  <html>
    <head>
      <title>Task it! - <?=getUserName()?> private page</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/default.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
			<nav class="grey black">
				<div class="container">
			    <div class="nav-wrapper">
			      <a href="<?=base_url()?>" class="brand-logo">Task it!</a>
			      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                <?php if (!isLogged()) { ?>
  			          <li><a class="modal-trigger" data-target="signinbox">Sign in</a></li>
                <?php } else { ?>
                  <li><a href="<?=base_url()?>me" class="me">Hi, <?=getUserName()?></a></li>
                  <li><a href="<?=base_url()?>task">My tasks</a></li>
                  <li><a href="<?=base_url()?>user/logout">Logout</a></li>
                <?php } ?>
  			      </ul>
  			      <ul class="side-nav" id="mobile-demo">
                <?php if (!isLogged()) { ?>
  			          <li><a class="modal-trigger" data-target="signinbox">Sign in</a></li>
                <?php } else { ?>
                  <li><a href="<?=base_url()?>me" class="me">Hi, <?=getUserName()?></a></li>
                  <li><a href="<?=base_url()?>task">My tasks</a></li>
                  <li><a href="<?=base_url()?>user/logout">Logout</a></li>
                <?php } ?>
  			      </ul>
			    </div>
				</div>
		  </nav>

      <div class="container">
				<div class="row">
					<div class="section">
				    <h4>Hi, <?=getUserName()?></h4>
				    <p>Congrats, now you are logged in and can access all of your tasks and add another ones. Another thing that you can do is add more contact information about you. It's cool, because you can exercise click on tabs and fill data using combo box and asynchronous requests.</p>
            <div class="row">
              <div class="col s12">
                <ul class="tabs">
                  <li class="tab col s3"><a class="active" href="#aboutyou">About you</a></li>
                  <li class="tab col s3"><a href="#secret">Secret, shhhh!</a></li>
                  <li class="tab col s3"><a href="#moredata">More data about you</a></li>
                </ul>
              </div>
              <div id="aboutyou" class="col s12">
                <div class="row somepadding">
                  <div class="input-field col s12">
                    <input value="<?=getUserName()?>" placeholder="Tell us what is your name" name="name" type="text" class="validate">
                    <label for="name">Name</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input value="<?=getUserLogin()?>" name="name" type="text" disabled>
                    <label for="name">Login</label>
                  </div>
                </div>
                <div class="row center">
                  <button class="waves-effect waves-light red darken-2 btn" id="changeAboutYou">Change my name!</button>
                </div>
              </div>
              <div id="secret" class="col s12">
                <div class="row somepadding">
                  <div class="input-field col s6">
                    <input placeholder="Take care, it need to be remembered" name="password" type="password" class="validate">
                    <label for="password">Set a new password</label>
                  </div>
                </div>
                <div class="row center">
                  <button class="waves-effect waves-light red darken-2 btn" id="changeMyPassword">Save my new password!</button>
                </div>
              </div>
              <div id="moredata" class="col s12">
                <div class="row somepadding">
                  <ul class="collection">
                    <?php foreach ($userdatas as $userdata): ?>
                      <li class="collection-item avatar">
                        <i class="material-icons circle"><?=$userdata->userdatatype?></i>
                        <span class="title"><?=$userdata->userdatavalue?></span><br />
                        <small>This is your <?=$userdata->userdatatype?></small>
                        <a class="secondary-content button" onclick="remove(this)" rev="<?=$userdata->userdataid?>" type="<?=$userdata->userdatatype?>"><i class="material-icons grey-text">delete</i></a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <div class="row center">
                  <button class="waves-effect waves-light red darken-2 btn modal-trigger" data-target="addmoredata">+ Add more data</button>
                </div>
              </div>
            </div>
				  </div>
				</div>
			</div>

      <div id="addmoredata" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Add more data about me</h4>
          <div class="row">
            What about tell us how to keep in contact with you? The is a great place to do that, just tell what data type you will add and the contact  then click in the "Save" button ;)
          </div>
          <div class="row">
            <label for="type">Type</label>
            <select name="type" class="browser-default">
              <option value="email">E-mail</option>
              <option value="phone">Phone</option>
            </select>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="Tell us what is your contact" name="contact" type="text" class="validate">
              <label for="contact">Contact</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a class="modal-action waves-effect waves-green btn-flat">Save</a>
        </div>
      </div>

			<footer class="page-footer grey">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
					    <h5>A little bit about this software</h5>
					    <p>This is a simple software used to learn how to automate tests. It is sustained by <a class="white-text" href="https://www.linkedin.com/in/juliodelimas/">Júlio de Lima</a>, a most handsome QA around the world. He never lies.</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Keep in touch</h5>
              <ul>
                <li><a class="grey-text text-lighten-3" href="https://twitter.com/juliodelimas">Twitter</a></li>
                <li><a class="grey-text text-lighten-3" href="https://www.linkedin.com/in/juliodelimas/">Linkedin</a></li>
                <li><a class="grey-text text-lighten-3" href="https://medium.com/@juliodelimas">Medium</a></li>
                <li><a class="grey-text text-lighten-3" href="mailto:iam@juliodelima.com.br">E-mail</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
          © <?=date('Y')?> Copyright | It does not matter, hahaha!
          </div>
        </div>
      </footer>

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/js/materialize.min.js"></script>
			<script type="text/javascript" src="<?=base_url()?>assets/js/me.js"></script>
    </body>
  </html>
