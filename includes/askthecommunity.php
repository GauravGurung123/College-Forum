<div class="item i1">
      <div class="list-group">
        <a id="ask" href="#" class="list-group-item list-group-item-action active">
          ASK THE COMMUNITY
        </a>
        <a id="board" href="#" class="list-group-item list-group-item-action disabled">BOARD</a>
          <?php
          if (isLoggedIn()){
              echo "<a id=\"p\" href=\"new_post.php\" class=\"list-group-item list-group-item-action\ text-success \">Create a disccussion</a>";
          } else {
              echo "<a id=\"p\" href=\"components/signup.php\" class=\"list-group-item list-group-item-action\">Create a disccussion</a>";
          }
          ?>

        <a id="p" href="index.php" class="list-group-item list-group-item-action">General disccussion</a>
        <a id="p" href="#" class="list-group-item list-group-item-action">Recent Post</a>
        <a id="p" href="#" class="list-group-item list-group-item-action ">Notice and Events</a>
        <a id="p" href="components/terms.html" class="list-group-item list-group-item-action ">Forum Rules</a>

        <a id="board" href="#" class="list-group-item list-group-item-action disabled">SUPPORT</a>
        <a id="p" href="#" class="list-group-item list-group-item-action">Help Us To Improve</a>
        <a id="p" href="#" class="list-group-item list-group-item-action">Report a Bug</a>
        <a id="p" href="components/terms.html" class="list-group-item list-group-item-action ">About Us</a>
        <a id="p" href="components/usersguide.php" class="list-group-item list-group-item-action ">Users Guide</a>
      </div>
    </div>