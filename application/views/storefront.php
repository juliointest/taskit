<!DOCTYPE html>
  <html>
    <head>
      <title>Task it!</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/default.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta property="og:title" content="Task it!" />
      <meta property="og:description" content="This is a simple software used to learn how to automate tests. It is sustained by Júlio de Lima, a most handsome QA around the world. He never lies." />
      <meta property="og:url" content="<?=base_url()?>" />
      <meta property="og:image" content="<?=base_url()?>assets/img/julioteachingtesting.jpeg" />
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

      <div class="banner"></div>

      <?php if (!isLogged()) { ?>
  			<div class="container">
  				<div class="row">
  					<div class="section center">
  				    <h5>Registration</h5>
  				    <p>Task it! allows you to use the most commom features in web applications in order to knows how to automate tests. Once registered you will can add, update, remove and search tasks. Besides, will you need to learn how to deal with ordinary problems that happens in the QA professional live, like: objects without id's or name's, variable timeouts, crazy popups, etc. I think that you will like to use this :)</p>
  						<p><a class="waves-effect waves-light red darken-2 btn modal-trigger" id="signup" data-target="signupbox">Ok, I wanna sign up now</a></p>
  				  </div>
  				</div>
  			</div>
      <?php } else { ?>
        <div class="container">
  				<div class="row">
  					<div class="section center">
  				    <h5>Amazing!</h5>
  				    <p>Now you are registered and can add tasks that you want to do in a far away future.</p>
  						<p><a class="waves-effect waves-light red darken-2 btn" href="<?=base_url()?>task">Let's add some tasks!</a></p>
  				  </div>
  				</div>
  			</div>
      <?php } ?>

      <div id="signupbox" class="modal modal-fixed-footer">
        <div class="modal-content">
          <form action="<?=base_url()?>user/signup" method="post" class="col s12">
            <h4>Sign up</h4>
            <div class="row">
              It's time to register yourself on our application to get access to private to your tasks. You need to fill all this information before click on "Save" button, okay?
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="Tell us what is your name" name="name" type="text" class="validate">
                <label for="name">Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input placeholder="It's time to create a login" name="login" type="text" class="validate">
                <label for="login">Login</label>
              </div>
              <div class="input-field col s6">
                <input placeholder="Take care, it need to be remembered" name="password" type="password" class="validate">
                <label for="password">Password</label>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <a class="modal-action waves-effect waves-green btn-flat">Save</a>
        </div>
      </div>

      <div id="signinbox" class="modal modal-fixed-footer">
        <div class="modal-content">
          <form action="<?=base_url()?>user/signin" method="post" class="col s12">
            <h4>Sign in</h4>
            <div class="row">
              Hey, seems like you have an account here. Well, what about fill your secret information and get access to your tasks? I assure that the information will not be shared with anyone.
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input placeholder="Please, tell us your login" name="login" type="text" class="validate">
                <label for="login">Login</label>
              </div>
              <div class="input-field col s6">
                <input placeholder="Excuse me, can you tell us a secret?" name="password" type="password" class="validate">
                <label for="password">Password</label>
              </div>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <a class="modal-action waves-effect waves-green btn-flat">Sign in</a>
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
			<script type="text/javascript" src="<?=base_url()?>assets/js/storefront.js"></script>
    </body>
  </html>
