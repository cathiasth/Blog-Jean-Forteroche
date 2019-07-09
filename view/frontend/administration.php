<?php $title = 'Jean Forteroche'; ?>
<?php require('header.php');
$menu = view_menu(); 
?>

<?php ob_start(); ?>

  <ul id="list_comment">
        <h2 class="adminH2">Liste des commentaires</h2>
        <p class="adminParagraphe" ><em>Validez ou supprimer les commentaires.</em></p>

        <?php while($c = $comments->fetch()) { ?>

        <li><?= $c['id'] ?> : <?= $c['author'] ?> : <?= $c['content'] ?> <br />
        <?php if ($c['approuve'] == 0) { ?>
        <a class="admin_approuve" href="<?= $_POST['URL_PATH'] ?>administration/confirm/<?= $c['id'] ?>">Approuver</a>
        <?php } ?>
        &nbsp;&nbsp;
        <a class="form_btn" href="<?= $_POST['URL_PATH'] ?>administration/deleteComment/<?= $c['id'] ?>">Supprimer</a></li><br />
        <?php } ?>
  </ul>

  <ul id="list_post">
        <h2 class="adminH2">Liste des articles</h2>
        <p class="adminParagraphe"><em>Validez, supprimer les articles.</em></p>

        <?php while($a = $posts->fetch()) { ?>

        <li><?= $a['id'] ?> : <?= $a['title']?><br />
        <a class="admin_approuve" href="<?= $_POST['URL_PATH'] ?>administration/confirmPost/<?= $a['id'] ?>">Approuver</a>
        &nbsp;&nbsp;
        <a class="form_btn" href="<?= $_POST['URL_PATH'] ?>administration/deletePost/<?= $a['id'] ?>">Supprimer</a></li><br />
        &nbsp;&nbsp;
        <?php } ?>
  </ul>

    <h2 class="adminH2">Nouveaux chapitres</h2>
    <p class="adminParagraphe"><em>Création et mise en ligne des chapitres.</em></p>


  <form id="form_articles" method="post" action="administration/create">
        
        <input type="text" placeholder="Titre" id="title" name="title"/><br />

        <textarea id="full-featured" name="content" contenteditable="true"></textarea><br />
        
        <button class="admin_approuve">Editer articles</button>
      
  </form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

<script>
  tinymce.init({
    selector: '#full-featured, #full-test'
  });
</script>