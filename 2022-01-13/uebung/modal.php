<?php require_once './inc/login.inc.php'; ?>
<!-- Modal -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php 
          try {
            $id = $_POST['id'];
            $stmt = $conn->prepare('SELECT description FROM content WHERE id=:id');
            $stmt->execute(array(':id' => $id));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0) {
                echo $row['description'];
            }
          } catch (PDOException $e) {
              echo $e->getMessage();
          }
          ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
    $('.close').click(function() {
        $('#showModal').modal('toggle');
    });
</script>