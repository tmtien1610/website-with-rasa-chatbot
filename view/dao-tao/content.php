<div class="row">
    <div class="col-4">
        <?php
        require_once "../../assets/database.php";
        $db = new Database();
        $query = 'SELECT * FROM `ctdt`';
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc()) {
        ?>
            <div id="<?= $row['ID']; ?>" onClick="loadPdf('<?= $row['ID']; ?>', 'CTDT')" class="border border-info p-3 w-100 text-center subject-link"><?= $row['Name']; ?></div>
        <?php
        }
        ?>
    </div>
    <div class="col-8 p-0" id="pdf-display">
        <button id="CTDT" type="button" onClick="loadPdf('', 'CTDT')" class="btn btn-outline-success">Chương trình đào tạo</button>
        <button id="KHHT" type="button" onClick="loadPdf('', 'KHHT')" class="btn btn-outline-success">Kế hoạch học tập mẫu</button>
        <iframe src="" id="pdf-frame" class="w-100 pt-3" style="height: 800px;"></iframe>
    </div>
</div>

<script src="script.js"></script>