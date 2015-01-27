# Endnotes
A simple solution for adding footnotes to your WordPress posts or pages.

## Description
Endnotes is a fork of John Watson’s [FD Footnotes](https://wordpress.org/plugins/fd-footnotes/) that has been updated to use the WordPress Settings API.

## Installation
1. Click the **Download Zip** button.
2. In your WordPress dashboard, navigate to **Plugins -> Add New** and click the **Upload** tab.
3. Upload the **zip archive** you downloaded.
4. Once the download is complete, click **Activate Plugin**.

## How to Use
You can add footnotes to your posts or pages by adding numbered inline content within square brackets. Place the inline content where you would like the superscript numeral to appear.

```
I am Jack's happy sentence that will contain a footnote[1. I am Jack's happy footnote] for calling out a reference.
```

Each footnote must have a number followed by a period and a space and then the actual footnote. They don’t have to be unique but it is recommended. It doesn’t matter what the numbers are since the footnotes will be automatically renumbered when the post is displayed.

Footnotes can contain anything you’d like including links, images, etc. Footnotes are automatically linked back to the spot in the text where the note was made.

## Important Notes

### Square Bracket Usage
Do not include square brackets [] inside the footnotes themselves.

### Unique Footnote Numbers
Footnote numbers don't need to be unique but it is highly recommended, especially if the text is identical for multiple footnotes. If you have multiple footnotes with the exact same text and number then you’ll get undesirable results.

### Replacing FD Footnotes with Endnotes
If you would like to replace FD Footnotes with Endnotes, you will need to deactivate FD Footnotes **before** activating Endnotes. Because this plugin is properly using the WordPress Setting API, you will need to navigate to the **Endnotes Settings** page and update your settings.

Once you have followed these steps, your footnotes should appear unaltered and function as expected.