# RSS Options

https://vanillaforums.org/addon/rssoptions-plugin

This plugin provides improvements to Vanillas RSS feed.
There are currently 2 options available:

`Announcements` Include announcements in the feed.

`DateLastComment` Set the publication date of discussions to the date of the last comment rather than the creation date of the discussion.
This will make feed items reappear as unread when new comments are posted.


These options are enabled by appending them to the query string of the feed URL, e.g:

    yourforum.com/categories/general.rss?DateLastComment=1
    yourforum.com/discussions.rss?DateLastComment=1
    
