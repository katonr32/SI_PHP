<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>All Albums</h4>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Album Title</th>
              <th>Release Year</th>
              <th>Artist Name</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require 'dbcon.php';
            $sql = "SELECT a.title AS album_title, a.release_year, ar.name AS artist_name
                    FROM albums a
                    JOIN artists ar ON a.artist_id = ar.id";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $row['album_title']; ?></td>
                  <td><?php echo $row['release_year']; ?></td>
                  <td><?php echo $row['artist_name']; ?></td>
                </tr>
              <?php
              }
            } else {
              echo "<tr><td colspan='3'>No albums found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
