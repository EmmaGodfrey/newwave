/* Image-led masonry: natural aspect ratios, variable widths, no fixed rows or column count. */
(() => {
    'use strict';
    const init = () => document.querySelectorAll('[data-image-wall]').forEach(wall => {
        if (wall.dataset.initialized) return;
        wall.dataset.initialized = 'true';
        let frame;
        let previousWidth = 0;
        const schedule = () => {
            cancelAnimationFrame(frame);
            frame = requestAnimationFrame(layout);
        };
        function layout() {
            const width = wall.clientWidth;
            if (!width) return;
            const gap = parseFloat(getComputedStyle(wall).getPropertyValue('--image-gap')) || 18;
            const unit = 4;
            const slots = Math.ceil(width / unit);
            const skyline = new Array(slots).fill(0);
            const tiles = Array.from(wall.children).filter(tile => tile.classList.contains('image-tile') && !tile.hidden);
            wall.classList.add('is-masonry');
            let bottom = 0;
            tiles.forEach(tile => {
                const img = tile.querySelector('img');
                const ratio = img && img.naturalHeight ? img.naturalWidth / img.naturalHeight : 1;
                const ideal = Math.round(Math.max(180, Math.min(480, 270 * Math.sqrt(ratio))) / unit) * unit;
                const tileWidth = width < 600 ? width : Math.min(width, ideal);
                tile.style.width = tileWidth + 'px';
                const span = Math.min(slots, Math.ceil((tileWidth + gap) / unit));
                const lastStart = Math.floor((width - tileWidth) / unit);
                let bestY = Infinity;
                let bestStart = 0;
                for (let start = 0; start <= lastStart; start++) {
                    let y = 0;
                    for (let i = start; i < Math.min(slots, start + span); i++) y = Math.max(y, skyline[i]);
                    if (y < bestY) { bestY = y; bestStart = start; }
                }
                tile.style.transform = 'translate(' + (bestStart * unit) + 'px,' + bestY + 'px)';
                const tileBottom = bestY + tile.getBoundingClientRect().height;
                for (let i = bestStart; i < Math.min(slots, bestStart + span); i++) skyline[i] = tileBottom + gap;
                bottom = Math.max(bottom, tileBottom);
            });
            wall.style.height = bottom + 'px';
        }
        wall.addEventListener('load', schedule, true);
        wall.addEventListener('error', schedule, true);
        const filters = document.querySelector('[data-image-filters="' + wall.id + '"]');
        if (filters) filters.addEventListener('click', event => {
            const button = event.target.closest('button[data-filter]');
            if (!button) return;
            filters.querySelectorAll('button').forEach(item => item.setAttribute('aria-pressed', String(item === button)));
            Array.from(wall.children).forEach(tile => {
                if (tile.classList.contains('image-tile')) tile.hidden = button.dataset.filter !== '*' && tile.dataset.category !== button.dataset.filter;
            });
            schedule();
        });
        new ResizeObserver(entries => {
            const width = entries[0].contentRect.width;
            if (width !== previousWidth) { previousWidth = width; schedule(); }
        }).observe(wall);
        new MutationObserver(schedule).observe(wall, { childList: true });
        if (document.fonts) document.fonts.ready.then(schedule);
        schedule();
    });
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
    else init();
})();
