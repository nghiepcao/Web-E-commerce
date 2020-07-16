<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Catalog Table
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
        <a href="<?php echo admin_url('catalog/add') ?>"><button class="btn btn-sm btn-default">Add</button></a>             
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
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
            <th>SORT ORDER</th>
            <th>NAME</th>
            <th>PARENT</th>
            <th>OPTION</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($list as $row): ?>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><?php echo $row->id ?></td>
            <td></span><?php echo $row->sort_order ?></td>
            <td></span><?php echo $row->name ?></td>
            <td></span><?php echo $row->parent_id ?></td>  
            <td>
              <a href="<?php echo admin_url('catalog/edit/'.$row->id) ?>" class="active" ui-toggle-class="">
                <i class="fa fa-check text-success text-active">edit</i>
              </a>
              <a href="javascript:;" onclick="return isconfirm('<?php echo admin_url('catalog/delete/'.$row->id); ?>');" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text">delete</i>
              </a>
            </td> 
          </tr>
          <script>
            function isconfirm(url_val){
              if(confirm('Are you sure you wanna delete this catalog ?') == false)
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
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>