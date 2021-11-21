<div class="category">
    <div class="category__content">
        <p class="category__header-title">DANH MỤC SẢN PHẨM</p>
        <div class="category__types">
            <div class="category-title">Tivi</div>
            <ul class="category__list">
               <?php
                $danhmuc=Category::getTrademark();
                    foreach ($danhmuc as $key => $value) {
                ?>
                <li class="category__item"><a href="index.php?controller=products&action=listtrademark&id=<?=$value["mahangsx"]?>"><?=$value["tenhangsx"]?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="category__types">
            <h5 class="category-title">Thể loại</h5>
            <ul class="category__list-size">
                 <?php
                    $danhmuc=Category::getAll();
                        foreach ($danhmuc as $key => $value) {
                ?>
                    <li class="category__item"><a href="index.php?controller=products&action=list&id=<?=$value["madm"]?>"><?=$value["tendm"]?></a></li>
                    <?php } ?>
            </ul>
        </div>
    </div>
</div>