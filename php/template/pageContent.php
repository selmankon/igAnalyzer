<?php
    function getPageContent($page){
        if ($page=='index'){}
        else if ($page=='index'){}
        else if ($page=='index'){}
        else if ($page=='index'){}

    }
    echo `
    <div class="container-fluid">
        <p class="mb-2">Bu sayfada takipçilerini görebilirsin. <br>Beğendiği gönderiye göre ya da attığı yoruma göre sıralamak için başlıkların üstlerine tıklayabilirsin.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Takipçiler</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>İsim</th>
                                <th>Kullanıcı Adı</th>
                                <th>Beğendiği Gönderi Sayısı</th>
                                <th>Attığı Yorum Sayısı</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($followers as $user) {
                                    $imageData = base64_encode(file_get_contents($user[0]));
                                    $src = 'data: '.';base64,'.$imageData; 
                                    echo '<tr>';                                                
                                    echo '<td class="col-md-1"><img class="img-profile-picture rounded-circle" src="'.$src.'"></td>';
                                    echo '<td class="col-md-3">'.$user[1].'</td>';
                                    echo '<td class="col-md-3">'.$user[2].'</td>';
                                    echo '<td class="col-md-1">'.$user[3].'</td>';
                                    echo '<td class="col-md-1">'.$user[4].'</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>`

?>