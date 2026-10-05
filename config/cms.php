<?php

return [

  /*
    |--------------------------------------------------------------------------
    | Multi-Domain Configuration
    |--------------------------------------------------------------------------
    */

  'domains' => [
    'creative' => env('CREATIVE_DOMAIN', 'clarivoxcreatives.com'),
    'news'     => env('NEWS_DOMAIN', 'clarivoxnews.com'),
  ],

  /*
    |--------------------------------------------------------------------------
    | Contact Form Recipient
    |--------------------------------------------------------------------------
    | Used when a site has no "contact_email" setting. Falls back to the
    | mail "from" address when unset.
    */

  'contact_email' => env('CONTACT_EMAIL'),

  /*
    |--------------------------------------------------------------------------
    | Available Site Types
    |--------------------------------------------------------------------------
    */

  'site_types' => [
    'creative' => 'Creative Agency',
    'news'     => 'News Portal',
  ],

  /*
    |--------------------------------------------------------------------------
    | Available Site Statuses
    |--------------------------------------------------------------------------
    */

  'site_statuses' => [
    'active'      => 'Active',
    'maintenance' => 'Maintenance',
    'inactive'    => 'Inactive',
  ],

  /*
    |--------------------------------------------------------------------------
    | Theme Base Path
    |--------------------------------------------------------------------------
    */

  'themes_path' => base_path('themes'),

  /*
    |--------------------------------------------------------------------------
    | Default Themes per Site Type
    |--------------------------------------------------------------------------
    */

  'default_themes' => [
    'creative' => 'creative',
    'news'     => 'news',
  ],

  /*
    |--------------------------------------------------------------------------
    | Article Statuses
    |--------------------------------------------------------------------------
    */

  'article_statuses' => [
    'draft'     => 'Draft',
    'published' => 'Published',
    'archived'  => 'Archived',
  ],

  /*
    |--------------------------------------------------------------------------
    | Comment Statuses
    |--------------------------------------------------------------------------
    */

  'comment_statuses' => [
    'pending'  => 'Pending',
    'approved' => 'Approved',
    'rejected' => 'Rejected',
    'spam'     => 'Spam',
  ],

];
