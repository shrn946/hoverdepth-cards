# HoverDepth Cards

HoverDepth Cards is a custom Elementor widget plugin for WordPress.
It creates interactive 3D parallax cards with smooth mouse movement.

## Features

- Repeater-based card management
- Card title, optional short description, foreground image, and background image
- Local dummy foreground and background images
- Per-card foreground image position controls
- Optional per-card link applied to the whole card
- Responsive card grid layout
- Outer width and spacing controls
- Cards per row control
- Cards area padding controls
- Card width, height, and shadow controls
- Card content alignment and padding controls
- Separate title and description style controls
- Typography, color, spacing, and text shadow controls
- Card shadow control
- Mouse tilt effect controls
- Gradient overlay controls (with option to hide on first card)

## Requirements

- WordPress (latest stable version recommended)
- Elementor plugin activated
- PHP version supported by your WordPress setup

## Installation

1. Download this plugin as a ZIP from GitHub.
2. Go to WordPress Dashboard -> Plugins -> Add New Plugin.
3. Click Upload Plugin.
4. Select the ZIP file and click Install Now.
5. Click Activate Plugin.

## How to Use

1. Edit a page with Elementor.
2. Search for widget: **HoverDepth Parallax Cards**.
3. Drag it into your section.
4. Add or edit cards in the repeater.
5. Configure styles in the Style tab:
   - Outer
   - Cards
   - Card Effects

## Widget Controls

### Content Tab

Cards repeater:

- Card Title
- Short Description (optional)
- Card Foreground Image
- Foreground Horizontal Position
- Foreground Vertical Position
- Card Background Image
- Card Link

The card link is applied to the whole card.

### Style Tab

Outer:

- Outer Width
- Spacing Top
- Spacing Bottom

Cards:

- Cards Per Row
- Cards Padding Top
- Cards Padding Bottom
- Cards Padding Left
- Cards Padding Right
- Card Width
- Card Height
- Card Shadow
- Content Alignment
- Card Padding Top
- Card Padding Bottom
- Title Color
- Title Typography
- Title Text Shadow
- Title Bottom Spacing
- Description Color
- Description Typography
- Description Text Shadow
- Description Text Align
- Description Bottom Spacing

Card Effects:

- Enable Mouse Effect
- Tilt Range
- Image Shift Multiplier
- Background Shift Multiplier
- Enable Gradient Overlay
- Hide on First Card
- Gradient Start
- Gradient End
- Gradient Angle
- Gradient Opacity

## Recommended Workflow

1. Add 3 to 6 cards for best visual balance.
2. Keep image sizes consistent.
3. Use short titles and short descriptions for clean design.
4. Adjust foreground image position for each card.
5. Start with medium tilt values, then fine tune.
6. Preview on desktop and mobile before publishing.

## Notes

- If you add many cards, grid layout keeps them aligned.
- Frontend mouse tilt works best on desktop devices.
- Always optimize images for better page speed.
- Background images use cover sizing and do not repeat.
- Default dummy assets are loaded from the plugin images folder.

## License

This project is provided as-is for learning and customization.
