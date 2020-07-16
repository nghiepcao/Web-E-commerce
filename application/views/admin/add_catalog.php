<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add Catalog
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                    </span>
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="form-horizontal " id="" method="post" action="" novalidate="novalidate">
                        <div class="form-group">
                            <label for="firstname" class="control-label col-lg-3">Catalog Name</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="name" name="name" value="<?php echo set_value('name') ?>" type="text">
                                <p class="help-block"><?php echo form_error('name') ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="control-label col-lg-3">Parent Catalog</label>
                            <div class="col-lg-6">
                                <select autocheck="true" name="parent_id" id="param_parent_id">
                                    <option value="0">This is Parent Catalog</option>
                                    <?php foreach($list as $row):?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="control-label col-lg-3">SORT ORDER</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="param_sort_order" name="sort_order" value="<?php echo set_value('sort_order') ?>" type="text">
                                <p class="help-block"><?php echo form_error('name') ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Add</button>
                                <a href="<?php echo admin_url('catalog/index') ?>">Show Catalog</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>