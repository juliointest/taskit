<!DOCTYPE html>
  <html>
    <head>
      <title>Task it! - My tasks</title>
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
				    <h5>My tasks</h5>
				    <p>Here is your tasks, you can manage what you need to do in the next days ou hours, it will help you! Click on the task status to change it! ;)</p>
            <div class="row">
              <ul id="tasklist" class="collection">
                <?php foreach ($tasks as $task): ?>
                  <li class="collection-item avatar">
                    <a class="button changeTaskStatus" onclick="change(this)" done="<?=$task->taskdone?>" rev="<?=$task->taskid?>"><i class="material-icons circle light-blue darken-2 white-text"><?=($task->taskdone == "yes")?"check_box":"check_box_outline_blank"?></i></a>
                    <span class="title"><?=$task->tasktitle?></span><br />
                    <p><?=friendlyDate($task->taskdatetime)?></p>
                    <small><?=$task->taskdescription?></small>
                    <a class="secondary-content button" onclick="remove(this)" rev="<?=$task->taskid?>"><i class="material-icons grey-text">delete</i></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="row center">
              <button class="waves-effect waves-light red darken-2 btn modal-trigger" data-target="addtask">+ Add a task</button>
            </div>
				  </div>
				</div>
			</div>

      <div id="addtask" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Add a new task</h4>
          <div class="row">
            We reach the most important thing on this application: schedule things that you need to do in order to stop procrastinating! Let's go!
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="What will are trying to procrastinate?" name="title" type="text" class="validate">
              <label for="title">Title of this task</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="What is the maximum date to do it?" name="date" type="text" class="validate datepicker">
              <label for="date">Date limit</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="What is the maximum time to do it?" name="time" type="text" class="validate timepicker">
              <label for="time">Time limit</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea placeholder="Tell us, please!" name="text" class="materialize-textarea"></textarea>
              <label for="text">Tell us more about it</label>
            </div>
          </div>
          <div class="row">
            <label for="done">It's done?</label>
            <select name="done" class="browser-default">
              <option value="not" selected>Not</option>
              <option value="yes">Yes</option>
            </select>
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
			<script type="text/javascript" src="<?=base_url()?>assets/js/task.js"></script>
    </body>
  </html>
