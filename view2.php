<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Artists in the Rock genre</h4>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Artist Name</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require 'dbcon.php';
            $sql = "SELECT ar.name AS artist_name
                    FROM artists ar
                    JOIN albums al ON ar.id = al.artist_id
                    JOIN genres g ON al.genre_id = g.id
                    WHERE g.name = 'Rock'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $row['artist_name']; ?></td>
                </tr>
              <?php
              }
            } else {
              echo "<tr><td colspan='1'>No artists found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
