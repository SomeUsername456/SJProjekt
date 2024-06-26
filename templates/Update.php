<?php
  include_once('../partials/header.php');
  require_once('../config.php');
  require_once('../_inc/App.php');

  // Load the configuration settings
  $config = include('../config.php');
  $app = new ToDoApp($config);
  $toDoList = $app->getToDoList();
  $userAuth = $app->getUserAuth();
?>
<div class="selectDiv">
  <form action="../_inc/updateTable.php" method="post">
    <input list="browsers" class="txtarea nadpis" name="UpdatedTitle" placeholder="Nadpis...">
    <datalist id="browsers">
      <?php
      // Check if the user is authenticated
      if ($userAuth->isAuthenticated()) {
          // Retrieve the titles for the user
          $titles = $toDoList->getTitles($userAuth->getUserId());
          // Loop through the titles and display them as options in the datalist
          foreach ($titles as $title) {
              // Escape special characters in the title
              echo '<option value="' . htmlspecialchars($title['Title'], ENT_QUOTES, 'UTF-8') . '">';
          }
      }
      ?>
    </datalist>
</div>

<section class="list_wrapper">
  <article class="list">
      <form action="../_inc/updateTable.php" method="post">
        <textarea class="txtarea nadpis" name="title" cols="39" rows="1" placeholder="Nadpis..."></textarea>
        <textarea class="txtarea opis" name="description" cols="39" rows="1" placeholder="Opis..."></textarea>
        <section class="zoznam_riadok">
          <div class="poradie">1.</div>
          <textarea class="txtarea zoznam" name="listItem" cols="39" rows="1" placeholder="Prvok..."></textarea>
        </section>
        
        <button type="submit" class="pridat_prvok">Aktualizovať</button>
      </form>
  </article>
</section>

<?php
  include_once('../partials/footer.php');
?>
