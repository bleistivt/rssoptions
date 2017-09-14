<?php

class RssOptionsPlugin extends Gdn_Plugin {

    public function categoriesController_render_before($sender) {
        // Is this a feed request?
        if ($sender->SyndicationMethod === SYNDICATION_NONE) {
            return;
        }

        // Is there any discussion data?
        if (!is_object($sender->DiscussionData) || !Gdn_Theme::inSection('DiscussionList')) {
            return;
        }

        $request = Gdn::request();
        $rss = $sender->DiscussionData->resultArray();

        // Use DateLastComment for <pubdate> element.
        if ($request->get('DateLastComment')) {
            foreach ($rss as &$row) {
                $row['DateInserted'] = $row['DateLastComment'];
            }
        }

        // Overwrite discussion data that will be used for rendering the RSS feed.
        $sender->DiscussionData->importDataset($rss);
        // Reset dataset type.
        $sender->DiscussionData->datasetType(DATASET_TYPE_OBJECT);
    }


    public function discussionsController_render_before($sender) {
        $this->categoriesController_render_before($sender);
    }

}
