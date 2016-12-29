<section class="content-header">
    <h1><?= __d('messenger', 'Messages'); ?></h1>
    <ol class="breadcrumb">
        <li><a href='<?= site_url('admin/dashboard'); ?>'><i class="fa fa-dashboard"></i> <?= __d('users', 'Dashboard'); ?></a></li>
        <li><?= __d('messenger', 'Messages'); ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?= __d('messenger', 'Create a new Message'); ?></h3>
    </div>
    <div class="box-body">
        <a class='btn btn-success' href='<?= site_url('admin/messages/create'); ?>'><?= __d('messenger', 'New Message'); ?></a>
    </div>
</div>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?= __d('messenger', 'Message Threads'); ?></h3>
        <div class="box-tools">
        <?= $threads->links(); ?>
        </div>
    </div>
    <div class="box-body">
<?php if (! $threads->isEmpty()) { ?>
    <?php foreach ($threads->getItems() as $thread) { ?>
        <?php $class = $thread->isUnread($currentUserId) ? 'callout-info' : ''; ?>
        <div class="callout <?= $class; ?>">
            <h4><strong><a href="<?= site_url('admin/messages/' . $thread->id); ?>" <?= empty($class) ? 'style="color:#3c8dbc;"' : ''; ?>><?= $thread->subject; ?></a></strong></h4>
            <p><?= $thread->latestMessage->body; ?></p>
            <br>
            <p><small><strong>Creator:</strong> <?= $thread->creator()->username ?></small></p>
            <p><small><strong>Participants:</strong> <?= $thread->participantsString($currentUserId); ?></small></p>
        </div>
    <?php } ?>
<?php } else { ?>
        <div class="alert alert-warning" style="margin: 0 5px 5px;">
            <h4><i class="icon fa fa-warning"></i> <?php echo strftime("%d %b %Y, %R", time()) ." - "; ?> <?= __d('messenger', 'Sorry, no threads.'); ?></h4>
            <?= __d('users', 'There are no Message Threads.'); ?>
        </div>
<?php } ?>
    </div>
</div>

</section>
