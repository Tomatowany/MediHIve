<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'MediHive';
    require_once('../../includes/shared/head-index.php');
    require_once('../../includes/shared/header-nav.php');
?>
<body>
    <main>
      <section id="banner">
        <div class="banner-bg">
          <div class="banner-text container-fluid">
            asdasd
          </div>
        </div>
      </section>
      <?php
        require_once '../../classes/medicalrecord.class.php';
        require_once '../../tools/functions.php';
        ?>

        <?php
        $medicalrecord = new MedicalRecord();

        // Fetch staff data (you should modify this to retrieve data from your database)
        $medicalrecordArray = $medicalrecord->show();
        ?>
        <div class="lamesa table-responsive-lg mx-auto">
            <table id="medicalrecordArray" class="table mx-auto table-responsive-lg table-sm table-striped table-bordered">
            <thead>
                    <tr>
                        <th scope="col">Medical Record ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Staff ID</th>
                        <th scope="col">Diagnosis</th>
                        <th scope="col">Date Time</th>
                    </tr>
                </thead>
                <tbody id="medicalrecordTableBody">
                    <?php
                    if ($medicalrecordArray) {
                        foreach ($medicalrecordArray as $item) {
                            ?>
                            <tr>
                                <td>
                                    <?= $item['medical_recordID'] ?>
                                </td>
                                <td>
                                    <?= $item['patientID'] ?>
                                </td>
                                <td>
                                    <?= $item['staffID'] ?>
                                </td>
                                <td>
                                    <?= $item['diagnosis'] ?>
                                </td>
                                <td>
                                    <?= $item['datetime'] ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php
    require_once('../../includes/js.php');
    ?>
    <script>
        $(document).ready(function () {
            $('#overview').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf'
                ]
            });
        });
    </script>
      
      
    </main>
    <?php
      require_once('../../includes/shared/footer-index.php');
    ?>
    <?php
        require_once('../../includes/js.php');
    ?>
</body>
</html>
