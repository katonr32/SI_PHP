<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>All Songs</h4>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Song Title</th>
              <th>Song Length</th>
              <th>Album Title</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require 'dbcon.php';
            $sql = "SELECT s.title AS song_title, s.length, a.title AS album_title
                    FROM songs s
                    JOIN albums a ON s.album_id = a.id";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $row['song_title']; ?></td>
                  <td><?php echo $row['length']; ?></td>
                  <td><?php echo $row['album_title']; ?></td>
                </tr>
              <?php
              }
            } else {
              echo "<tr><td colspan='3'>No songs found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
