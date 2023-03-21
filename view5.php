<div class="row" align="center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Album Count by Genre</h4>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Genre Name</th>
              <th>Album Count</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require 'dbcon.php';
            $sql = "SELECT g.name AS genre_name, COUNT(a.id) AS album_count
                    FROM genres g
                    JOIN albums a ON g.id = a.genre_id
                    GROUP BY g.id";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $row['genre_name']; ?></td>
                  <td><?php echo $row['album_count']; ?></td>
                </tr>
              <?php
              }
            } else {
              echo "<tr><td colspan='2'>No data found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
