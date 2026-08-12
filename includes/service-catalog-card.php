<?php
/**
 * Single service catalog card — multiple layout variants for services.php grid.
 * Expects: $slug, $srv, $layout (wide|standard|compact|featured|horizontal|accent)
 */
if (!isset($slug, $srv, $layout)) {
    return;
}

$cardUrl   = SITE_URL . $srv['url'];
$icon      = htmlspecialchars($srv['icon']);
$category  = htmlspecialchars($srv['category']);
$title     = htmlspecialchars($srv['title']);
$shortDesc = htmlspecialchars($srv['short_desc']);
$turnaround = htmlspecialchars($srv['turnaround']);
$issues    = $srv['common_issues'] ?? [];
$dataTitle = htmlspecialchars(strtolower($srv['title'] . ' ' . $srv['short_desc'] . ' ' . implode(' ', $issues)));

$layoutClass = 'catalog-card--' . preg_replace('/[^a-z]/', '', $layout);
$spanClass   = in_array($layout, ['wide', 'featured'], true) ? ' bento-span-2' : '';
?>
<article
  class="service-card catalog-card service-catalog-item <?php echo $layoutClass . $spanClass; ?>"
  data-category="<?php echo $category; ?>"
  data-title="<?php echo $dataTitle; ?>"
>
  <?php if ($layout === 'wide'): ?>
    <div class="catalog-card-wide">
      <div class="catalog-card-wide-left">
        <div class="service-icon-box catalog-icon-lg">
          <i data-lucide="<?php echo $icon; ?>" style="width: 28px; height: 28px;"></i>
        </div>
        <span class="catalog-tag"><?php echo $category; ?></span>
        <span class="catalog-turnaround"><i data-lucide="zap" style="width: 14px; height: 14px;"></i> <?php echo $turnaround; ?></span>
      </div>
      <div class="catalog-card-wide-right">
        <h3 class="service-card-title"><?php echo $title; ?></h3>
        <p class="service-card-desc"><?php echo $shortDesc; ?></p>
        <ul class="service-card-features catalog-features-grid">
          <?php foreach (array_slice($issues, 0, 4) as $issue): ?>
            <li><i data-lucide="check-circle" style="width: 14px; height: 14px;"></i> <?php echo htmlspecialchars($issue); ?></li>
          <?php endforeach; ?>
        </ul>
        <div class="catalog-card-actions">
          <button class="btn btn-primary btn-sm" data-open-modal="booking-modal" data-service-title="<?php echo $title; ?>">Book</button>
          <a href="<?php echo $cardUrl; ?>" class="btn btn-outline btn-sm">Details &rarr;</a>
        </div>
      </div>
    </div>

  <?php elseif ($layout === 'featured'): ?>
    <div class="catalog-card-featured-head">
      <div class="service-icon-box catalog-icon-lg">
        <i data-lucide="<?php echo $icon; ?>" style="width: 26px; height: 26px;"></i>
      </div>
      <span class="catalog-tag catalog-tag-light"><?php echo $category; ?></span>
    </div>
    <h3 class="service-card-title"><?php echo $title; ?></h3>
    <p class="service-card-desc"><?php echo $shortDesc; ?></p>
    <ul class="service-card-features catalog-features-grid">
      <?php foreach (array_slice($issues, 0, 4) as $issue): ?>
        <li><i data-lucide="check-circle" style="width: 14px; height: 14px;"></i> <?php echo htmlspecialchars($issue); ?></li>
      <?php endforeach; ?>
    </ul>
    <div class="catalog-card-footer">
      <span class="catalog-turnaround"><i data-lucide="zap" style="width: 14px; height: 14px;"></i> <?php echo $turnaround; ?></span>
      <div class="catalog-card-actions">
        <button class="btn btn-accent btn-sm" data-open-modal="booking-modal" data-service-title="<?php echo $title; ?>">Book Now</button>
        <a href="<?php echo $cardUrl; ?>" class="btn btn-outline btn-sm">View Service</a>
      </div>
    </div>

  <?php elseif ($layout === 'horizontal'): ?>
    <div class="catalog-card-horizontal">
      <div class="catalog-card-horizontal-icon">
        <div class="service-icon-box" style="margin-bottom: 0;">
          <i data-lucide="<?php echo $icon; ?>" style="width: 24px; height: 24px;"></i>
        </div>
      </div>
      <div class="catalog-card-horizontal-body">
        <div class="catalog-card-topline">
          <span class="catalog-tag catalog-tag-sm"><?php echo $category; ?></span>
        </div>
        <h3 class="service-card-title"><?php echo $title; ?></h3>
        <p class="service-card-desc catalog-desc-sm"><?php echo $shortDesc; ?></p>
        <ul class="service-card-features">
          <?php foreach (array_slice($issues, 0, 2) as $issue): ?>
            <li><i data-lucide="check-circle" style="width: 14px; height: 14px;"></i> <?php echo htmlspecialchars($issue); ?></li>
          <?php endforeach; ?>
        </ul>
        <div class="catalog-card-footer catalog-card-footer-inline">
          <span class="catalog-turnaround catalog-turnaround-sm"><i data-lucide="zap" style="width: 13px; height: 13px;"></i> <?php echo $turnaround; ?></span>
          <div class="catalog-card-actions">
            <button class="btn btn-primary btn-sm" data-open-modal="booking-modal" data-service-title="<?php echo $title; ?>">Book</button>
            <a href="<?php echo $cardUrl; ?>" class="btn btn-outline btn-sm">&rarr;</a>
          </div>
        </div>
      </div>
    </div>

  <?php elseif ($layout === 'compact'): ?>
    <div class="catalog-card-compact">
      <div class="catalog-card-compact-head">
        <div class="service-icon-box catalog-icon-sm" style="margin-bottom: 0;">
          <i data-lucide="<?php echo $icon; ?>" style="width: 20px; height: 20px;"></i>
        </div>
        <span class="catalog-tag catalog-tag-sm"><?php echo $category; ?></span>
      </div>
      <h3 class="service-card-title catalog-title-sm"><?php echo $title; ?></h3>
      <p class="service-card-desc catalog-desc-xs"><?php echo $shortDesc; ?></p>
      <?php if (!empty($issues[0])): ?>
        <p class="catalog-issue-pill"><i data-lucide="alert-circle" style="width: 13px; height: 13px;"></i> <?php echo htmlspecialchars($issues[0]); ?></p>
      <?php endif; ?>
      <div class="catalog-card-footer catalog-card-footer-stack">
        <span class="catalog-turnaround catalog-turnaround-sm"><i data-lucide="zap" style="width: 13px; height: 13px;"></i> <?php echo $turnaround; ?></span>
        <div class="catalog-card-actions catalog-card-actions-full">
          <a href="<?php echo $cardUrl; ?>" class="btn btn-outline btn-sm" style="flex: 1; justify-content: center;">Details</a>
          <button class="btn btn-primary btn-sm" style="flex: 1;" data-open-modal="booking-modal" data-service-title="<?php echo $title; ?>">Book</button>
        </div>
      </div>
    </div>

  <?php elseif ($layout === 'accent'): ?>
    <div class="catalog-card-accent-bar"></div>
    <div class="catalog-card-accent-body">
      <div class="catalog-card-topline">
        <div class="service-icon-box catalog-icon-sm" style="margin-bottom: 0;">
          <i data-lucide="<?php echo $icon; ?>" style="width: 22px; height: 22px;"></i>
        </div>
        <span class="catalog-tag"><?php echo $category; ?></span>
      </div>
      <h3 class="service-card-title"><?php echo $title; ?></h3>
      <p class="service-card-desc"><?php echo $shortDesc; ?></p>
      <ul class="service-card-features catalog-issue-chips">
        <?php foreach (array_slice($issues, 0, 3) as $issue): ?>
          <li><?php echo htmlspecialchars($issue); ?></li>
        <?php endforeach; ?>
      </ul>
      <div class="catalog-card-footer">
        <span class="catalog-turnaround"><i data-lucide="zap" style="width: 14px; height: 14px;"></i> <?php echo $turnaround; ?></span>
        <div class="catalog-card-actions">
          <button class="btn btn-accent btn-sm" data-open-modal="booking-modal" data-service-title="<?php echo $title; ?>">Book</button>
          <a href="<?php echo $cardUrl; ?>" class="btn btn-outline btn-sm">Details</a>
        </div>
      </div>
    </div>

  <?php else: /* standard */ ?>
    <div class="catalog-card-topline">
      <div class="service-icon-box" style="margin-bottom: 0;">
        <i data-lucide="<?php echo $icon; ?>" style="width: 24px; height: 24px;"></i>
      </div>
      <span class="catalog-tag"><?php echo $category; ?></span>
    </div>
    <h3 class="service-card-title"><?php echo $title; ?></h3>
    <p class="service-card-desc"><?php echo $shortDesc; ?></p>
    <ul class="service-card-features">
      <?php foreach (array_slice($issues, 0, 3) as $issue): ?>
        <li><i data-lucide="check-circle" style="width: 16px; height: 16px;"></i> <?php echo htmlspecialchars($issue); ?></li>
      <?php endforeach; ?>
    </ul>
    <div class="catalog-card-footer">
      <span class="catalog-turnaround"><i data-lucide="zap" style="width: 14px; height: 14px;"></i> <?php echo $turnaround; ?></span>
      <div class="catalog-card-actions">
        <button class="btn btn-primary btn-sm" data-open-modal="booking-modal" data-service-title="<?php echo $title; ?>">Book</button>
        <a href="<?php echo $cardUrl; ?>" class="btn btn-outline btn-sm">Details &rarr;</a>
      </div>
    </div>
  <?php endif; ?>
</article>
