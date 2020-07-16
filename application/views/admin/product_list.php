<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Product Table
    </div>
    
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <?php $this->load->view('admin/message', $this->data) ?>
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>
        <a href="<?php echo admin_url('product/add') ?>"><button class="btn btn-sm btn-default">Add</button></a>             
      </div>
      <form method="get" action="<?php echo site_url('admin/product') ?>">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input name="name" type="text" value="" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="submit">Search!</button>
            </span>
          </div>
        </div>
      </form>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>ID</th>
            <th>IMAGE</th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>CONTENT</th>
            <th>DISCOUNT</th>
            <th>EDIT</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($list as $row): ?>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><?php echo $row->id ?></td>
            <td><img height="50" src="<?php echo base_url('upload/product/'.$row->image_link)?>" alt=""></td>
            <td></span><?php echo $row->name ?><br/><?php echo 'Sold: '.$row->buyed.' | View: '.$row->view ?></td>
            <td></span>
                  <?php if($row->discount > 0){
                          $price_new = $row->price - $row->discount;
                          echo number_format($price_new);
                  ?><p style="text-decoration:line-through"><?php echo number_format($row->price) ?></p>
                  <?php }else{
                    echo number_format($row->price);
                  } ?>
            </td>
            <td></span><?php echo $row->content ?></td>
            <td></span><?php echo number_format($row->discount) ?></td>  
            <td>
              <a href="<?php echo admin_url('product/edit/'.$row->id) ?>" class="active" ui-toggle-class="">
                <i class="fa fa-check text-success text-active">edit</i>
              </a>
              <a href="javascript:;" onclick="return isconfirm('<?php echo admin_url('product/delete/'.$row->id); ?>');" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text">delete</i>
              </a>
            </td> 
          </tr>
          <script>
            function isconfirm(url_val){
              if(confirm('Are you sure you wanna delete this product ?') == false)
              {
                  return false;
              }
              else
              {
                  location.href=url_val;
              }
            }
          </script>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 10 items per page</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><?php echo $pagination ?></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>