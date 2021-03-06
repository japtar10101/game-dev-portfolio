# 2020.7.2
## 5/13/2020
- New enhancement - Adding Github Actions for mirroring to Bitbucket automatically.

# 2020.7.1
## 3/12/2020
- New enhancement - Changing the font to use Lato as title font, and Raleway as body.

# 2020.7.0
## 3/11/2020
- New feature #17 - Header on the static front page and blog page can now be customized to include a video media, or even a Youtube video.  Simply use the Customize option under the admin bar or theme menu, and assign a video.

# 2020.6.2
## 3/5/2020
- New feature - Adding the class, `flush`, which can be used in columns, embeds, and galleries.  In short, it removes the gaps between elements, making the edges of these parts "flush" next to each other and fill out the entire content portion of the page.
- Fixed issue #24 - Created a temporary resolution to Youtube videos not taking up the entire width of the content page by assigning it a maximum width of 1024px.  Alas, the setting is assigned on PHP's end, so a more dynamic solution would require more inspection (using javascript and PHP acting together somehow).
- Fixed issue #7 - Removing some unnecessary margins in Jetpack tiled gallery.

# 2020.6.1
## 3/5/2020
- New enhancement #15 - Added reference to the [Resume Block plugin](https://github.com/japtar10101/resume-block), which is now released.
- Fixed issue - Reverted a change where the header, "Blog" would appear at the top of a blog.  Removed for keeping the styling consistent with the rest of the theme.
- Fixed issue - Updated documentation.

# 2020.6.0
## 3/2/2020
- New feature #6 - Pagination is now styled with Bulma, compete with page numbers.  Works on blog, archive, search, and comments.
- New feature #6 - Added partial support with Jetpack Infinite Scroll.  Currently, the portfolio does not support Infinite Scroll yet, due to how strangely Masonry works.  Comments are not supported, either.

# 2020.5.1
## 2/27/2020
- Fixed issue - Portfolio thumbnail caption now properly wrap to more than one line if it gets too long.

# 2020.5.0
## 2/27/2020
- New feature #8 - Jetpack contact form is now stylized to fit the Bulma design.  This required changing the HTML generated from each field.
- Fixed issue #18 - Integrated the imagesloaded javascript library to check whether the images in the Portfolio page is properly loaded.  Will call the Masonry layout function each time an image is loaded.

# 2020.4.1
## 2/26/2020
- New enhancement - Sidebar menu has animations.
- New enhancement - Links now fade to dark, rather than jump to it, on hover.  In short, hover.css is now partially integrated.
- New enhancement - Portfolio visuals have changed yet again.  This time, they're based off of the Bulma's button styling, rather than Bulma's box.
- Fixed issue - Order of portfolio thumbnail is now left-to-right, rather than up-to-down.  This required integrating with Masonry javascript.

# 2020.4.0
## 2/18/2020
- New feature #5 - Sidebar now has the primary menu built-in.
- New feature - Added a mobile-only navbar stickied at the top of the screen for quick menu navigation access.
- Fixed issue #16 - The title part of the sidebar now properly stickies to the top of the screen, regardless of screen ratio.
- Fixed issue - Search results does not double-post the header.
- Fixed issue - If one css styles #primary, the header will remain flushed to the edges of the content while leaving the text all properly padded.  This styling is in-line with the sidebar.

# 2020.3.1
## 2/17/2020
- Fixed issue - Footer displays copyrights and extra info by default, rather than leaving the space empty.

# 2020.3.0
## 2/17/2020
- New feature #13 - Adding customization to footer, including editing copyright info, and adding widgets below the copyright info as well as above.
- Fixed issue #3 - Sidebar no longer disappears if no widgets are assigned to it.

# 2020.2.1
## 2/16/2020
- Fixed issue #4 - Content area of Jetpack Portfolio listing page (Archive: Portfolio) is now tagged to take up 3/4 of the screen width.

# 2020.2.0
## 2/16/2020
- New feature - Turning Jetpack Portfolio listing page (Archive: Portfolio) into a grid of thumbnails of featured images from each portfolio entry.

# 2020.1.1
## 2/16/2020
- Fixed issue #2 - Jetpack Tiled Gallery no longer causes images in the main content area to expand indefinitely.

# 2020.1.0
## 2/14/2020
- First release.
- Integrated Bulma css library to the starter theme, Underscore.
