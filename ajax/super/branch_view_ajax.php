<?php

require_once("../../loader.php");
require_once('../../helpers/querys.php');

$branches = getAllBranch();
$studentsCount = count(getAllStudent());

if (count($branches) > 0) { ?>
<div class="col-lg-12">
    <div class="row">
    <!-- Sales Card -->
    <div class="col-md-12">
        <div class="card info-card sales-card">

        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
                <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Name</a></li>
            <li><a class="dropdown-item" href="#">Code</a></li>
            <li><a class="dropdown-item" href="#">Status</a></li>
            </ul>
        </div>

        <div class="card-body">
            <div class="row">
            <?php 
                $cnt = 0;
                foreach ($branches as $branch) { 
                    $cnt?>

                <div class="col-sm-6 col-lg-4 col-md-6">
                    <h5 class="card-title"><?php echo $branch->code; ?> <span>| <?php echo $branch->name;?></span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <a href="branch_view.php?id=<?php echo $branch->branch_id;?>"><i class="bi bi-building" style="color: <?php echo $branch->color; ?>;"></i></a>
                        </div>
                        <div class="ps-3">
                        <h6><?php 
                        $branchCount = count(getStudent("branch_id=".$branch->branch_id));
                        echo $branchCount; ?><span class="small pt-1" style="color: <?php echo $branch->color;?>;"> Students</span></h6>
                        <span class="text-success small pt-1 fw-bold"> <?php echo round(($branchCount / ($studentsCount==0)?1:$studentsCount) * 100, 1); ?> %</span> <span class="text-muted small pt-2 ps-1">of total students</span>

                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
        </div>
        </div>
    </div><!-- End Sales Card -->
</div>

<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">All <span>| Branches</span></h5>

            <table class="table table-borderless datatable">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Code</th>
                <th scope="col">Address</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $cnt = 0;
                foreach ($branches as $branch) { 
                    $cnt += 1;
                    ?>
                    <tr>
                    <th scope="row"><?php echo $cnt; ?></th>
                    <td><a href="branch_view.php?id=<?php echo $branch->branch_id;?>" class="text-primary"><?php echo $branch->name; ?></a></td>
                    <td><?php echo $branch->code; ?></td>
                    <td><?php echo $branch->address; ?></td>
                    <td><span class="<?php echo($branch->status==1) ? "badge bg-warning" : "badge bg-success"; ?>"><?php echo getStyle("style_id=".$branch->status)[0]->status;?></span></td>
                    <td>
                        <div class="">
                            <a class="icon" href="#<?php echo $branch->branch_id;?>" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Actions</h6>
                                </li>

                            <li><a class="dropdown-item" href="branch_view.php?id=<?php echo $branch->branch_id;?>">View</a></li>
                            <li><a class="dropdown-item" href="super_edit_branch.php?id=<?php echo $branch->branch_id;?>">Edit</a></li>
                            <li><a class="dropdown-item delete-branch" href="#" data-branch-id="<?php echo $branch->branch_id; ?>">Delete</a></li>

                            </ul>
                        </div>
                    </td>
                    </tr>
                <?php } ?>
            </tbody>
            </table>

        </div>
    </div>
</div><!-- End Recent Sales -->

<?php } ?>
<script src="datajs/branch.js"> </script>