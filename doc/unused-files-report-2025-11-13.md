# Unused Files Report (2025-11-13)

Scope: Determined by searching project-wide for includes, requires, and internal links (href/action) from entry points: `index.php -> CMS/index.php`, shared includes, primary public pages, and admin area.

Candidates appear unreferenced anywhere in the codebase and not linked from current navigation.

## Root PHP pages likely unused
- actualindex.php
- index1.php
- index2.php
- indeximg.php
- education.php
- gallery.php
- adpost.php
- block.php
- jila.php
- memo.php
- msgbox.php
- onloadmsg.php
- path-diagnostic.php
- debug-images.php
- sambhag.php
- sankul.php
- taluk.php

## Folders likely unused
- adoptedschool/ (contains simple redirects to admin/adoptedschoollist.php, not linked anywhere)

## Notes and exclusions
- success.php: not referenced in code, but may be a payment-return endpoint. Keeping for now unless confirmed unused.
- Database table files (*.frm, *.MYD, *.MYI) under webroot are not used by the site (DB points to remote server) and should not be in webroot. Recommend archiving outside the project rather than deleting without explicit approval.
- club/ seems to be a separate app; not linked from current CMS navigation, but it has its own internal navigation. Excluded from deletion pending decision.

## Method
- Grep for `include|require` usage.
- Grep for `href="*.php"` and common redirects `window.location.href`.
- Verified no inbound references for the above candidates.

Confirm before deletion. Optionally, we can archive to `doc/_archive_2025-11-13/` before removal.
