# Portfolio Redirect Feature

## Overview
The portfolio system now supports redirecting users to external pages when they click on portfolio items, with a fallback to the "under construction" modal when no redirect URL is specified.

## How It Works

### Database Structure
- Added `redirect_url` field to the `portfolios` table
- Field is nullable - when `null`, the modal will be shown
- When a URL is provided, clicking the item will open the URL in a new tab

### Frontend Behavior
- **With redirect_url**: Clicking opens the URL in a new tab (`window.open(url, '_blank')`)
- **Without redirect_url**: Clicking shows the "under construction" modal

### Usage

#### Setting a Redirect URL
To make a portfolio item redirect to an external page:

```php
// Via Tinker
App\Models\Portfolio::where('id', 1)->update(['redirect_url' => 'https://example.com']);

// Via Eloquent
$portfolio = Portfolio::find(1);
$portfolio->redirect_url = 'https://example.com';
$portfolio->save();
```

#### Removing Redirect (Show Modal)
To make a portfolio item show the modal instead:

```php
// Via Tinker
App\Models\Portfolio::where('id', 1)->update(['redirect_url' => null]);

// Via Eloquent
$portfolio = Portfolio::find(1);
$portfolio->redirect_url = null;
$portfolio->save();
```

### Components Updated
- `KeyContent.vue` - Handles redirects for key creations
- `OtherProjects.vue` - Handles redirects for other projects
- `OtherProjectsGrid.vue` - Passes redirect_url data
- `Content.vue` - Updated interface and data passing

### Testing
1. Set a `redirect_url` for a portfolio item
2. Click on the item - it should open the URL in a new tab
3. Set `redirect_url` to `null` for another item
4. Click on that item - it should show the "under construction" modal

## Database Migration
The feature includes a migration that adds the `redirect_url` column:
- File: `database/migrations/2025_10_11_091815_add_redirect_url_to_portfolios_table.php`
- Column: `redirect_url` (nullable string)
