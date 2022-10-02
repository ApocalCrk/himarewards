<?php include_once '/vendor/autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Hima Rewards - Himpunan Mahasiswa Informatika</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>
<body class="page-leaderboard">

    <section class="leaderboard-progress">
        <div class="contain text-center">
            <img alt="Leaderboard Hima Rewards" class="mb-2" src="https://v3.himaforka-uajy.org/assets/images/logo.png" width="180">
            <h2 style="margin-top: -30px">Leaderboard Hima Rewards</h2>
            <p class="lead"><a href="#"> Hima Rewards</a> merupakan program kerja dari Himaforka UAJY yang bertujuan untuk menghitung jumlah poin yang dikumpulkan oleh mahasiswa informatika yang aktif dan ikut berpartisipasi dalam kegiatan yang di adakan oleh Himaforka.</p>
        </div>
    </section>

    <section class="ranking">
        <div class="contain">
            <div class="ranking-table">
                <div class="ranking-table-header-row">
                    <div class="ranking-table-header-data h6">Peringkat</div>
                    <div class="ranking-table-header-data h6">Nama</div>
                    <div class="ranking-table-header-data h6">Poin</div>
                    <div class="ranking-table-header-data h6">Detail</div>
                </div>
                
                <?php for($i = 1; $i<=100; $i++){
                        echo $i;
                       } ?>
                
                <?php foreach ($data as $key => $value) : ?>
                <?php if ($key < 3) : ?>
                <div class="ranking-table-row-leader-<?php echo $value['rank']; ?>">
                    <div class="ranking-table-data-leader-<?php echo $value['rank']; ?>">
                        <div class="
                        <?php if ($value['rank'] == 1) : ?>
                            medal-gold
                        <?php elseif ($value['rank'] == 2) : ?>
                            medal-silver
                        <?php elseif ($value['rank'] == 3) : ?>
                            medal-bronze
                        <?php endif; ?>
                        "></div>
                    </div>
                    <div class="ranking-table-data">
                        <?php echo $value['nama'] ?>
                    </div>
                    <div class="ranking-table-data">
                        <div class="complete"><?php echo $value['score']; ?></div>
                    </div>
                    <div class="ranking-table-data">
                        <div class="complete"><a data-id="<?php echo $value['rank']; ?>" class="detail">Lihat</a></div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>

                <div class="ranking-table-body">
                    <?php foreach ($data as $key => $value) : ?>
                        <?php if($key > 2) : ?>
                        <div class="ranking-table-row">
                            <div class="ranking-table-data">
                                <?php echo $value['rank']; ?>
                            </div>
                            <div class="ranking-table-data">
                                <?php echo $value['nama']; ?>
                            </div>
                            <div class="ranking-table-data">
                                <div class="complete"><?php echo $value['score']; ?></div>
                            </div>
                            <div class="ranking-table-data">
                                <div class="complete"><a data-id="<?php echo $value['rank']; ?>" class="detail">Lihat</a></div>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>

    </section>

    <!-- modal -->
    <div id="open-modal" class="modal-window">
        <div class="ranking-table">
            <a title="Close" class="modal-close">Close</a>
            <h2>Detail Poin</h2>
            <div class="ranking-table-header-row">
                <div class="ranking-table-header-data h6" style="margin-bottom: 0!important;">Peringkat</div>
                <div class="h6 info-peringkat"></div>
                <div class="ranking-table-header-data h6" style="margin-bottom: 0!important;">Nama</div>
                <div class="h6 info-data-name"></div>
                <div class="ranking-table-header-data h6" style="margin-bottom: 0!important;">Total Poin</div>
                <div class="h6 info-data-score"></div>
                <div class="ranking-table-header-data h6" style="margin-bottom: 0!important;">Detail</div>
                <table class="table-detail">
                    <thead>
                        <tr>
                            <th style="padding: 0px 21px 0 0;">Nama Kegiatan</th>
                            <th>Poin</th>
                        </tr>
                    </thead>
                    <tbody class="info-data-detail">
                        <tr>
                            <td>Tutorial UTS</td>
                            <td class="info-data-detail-uts"></td>
                        </tr>
                        <tr>
                            <td>Tutorial UAS</td>
                            <td class="info-data-detail-uas"></td>
                        </tr>
                        <tr>
                            <td>Workshop Internal</td>
                            <td class="info-data-detail-workshop"></td>
                        </tr>
                        <tr>
                            <td>Sharing Alumni 1</td>
                            <td class="info-data-detail-sharing1"></td>
                        </tr>
                        <tr>
                            <td>Sharing Alumni 2</td>
                            <td class="info-data-detail-sharing2"></td>
                        </tr>
                        <tr>
                            <td>Pengabdian</td>
                            <td class="info-data-detail-pengabdian"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="random.js"></script>
 </body>
</html>
