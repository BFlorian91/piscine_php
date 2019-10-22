<?php

    function display_articles()
    {
        $articles = unserialize(file_get_contents("../private/products.csv"));
?>      <table class="tableau">
            <thead>
                <tr>
                    <td><b>Ref<b/></td>
                    <td>Category</td>
                    <td>Price</td>
                    <td>Stock</td>
                    <td>Image</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
    <?php   foreach ($articles as $key => $val)
            { ?>
                <tr>
                        <td><?php echo $val['ref'] ?></td>
                        <td><?php echo $val['category'] ?></td>
                        <td><?php echo $val['price'] ?></td>
                        <td><?php echo $val['stock'] ?></td>
                        <td><img style="max-width:250px; max-height:250px; text-align:center;" src="https://cdn.intra.42.fr/users/<?php echo $articles[$key]['img'];?>.jpg" alt="Image de <?php echo $articles[$key]['ref'];?>"></td>
                        <td>
                            <form  action="../model/action_remove_articles.php" method="POST">
                                <input type="text" style="display: none;" name="ref" value="<?php echo $val['ref']?>">
                                <input style="float: right; width:100px;" type="submit" class="button_in_form" value="remove">
                            </form>
                        </td>
                        <td>
                            <form action="edit_articles.php" method="POST">
                                <input type="hidden" name="ref" value="<?php echo $val['ref']?>">
                                <input type="hidden" name="category" value="<?php echo $val['category']?>">
                                <input type="hidden" name="price" value="<?php echo $val['price']?>">
                                <input type="hidden" name="stock" value="<?php echo $val['stock']?>">
                                <input type="hidden" name="img" value="<?php echo $val['img']?>">
                                <input style="float: right; width:100px; margin-right: 10px;" type="submit" class="button_in_form" value="edit">
                            </form>
                        </td>
                    </tr>

<?php       } ?>                
            </tbody>
           </table>
<?php    }