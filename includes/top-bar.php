<!-- Top Bar -->
<div class="top-bar">
    <div class="container flex-between">
        <div class="top-bar-left">
            <span class="top-bar-item">
                <i class="fas fa-phone"></i>
                <a href="tel:+917671003535">+91 7671 003535</a>
            </span>
            <span class="top-bar-separator">|</span>
            <span class="top-bar-item">
                <i class="fas fa-envelope"></i>
                <a href="mailto:shantiniketan99@gmail.com">shantiniketan99@gmail.com</a>
            </span>
        </div>
        <div class="top-bar-right">
            <a href="assets/documents/brochure.pdf" class="doc-link" target="_blank">Brochure</a>
            <span class="top-bar-separator">|</span>
            <a href="assets/documents/calender.pdf" class="doc-link" target="_blank">Calendar</a>
            <span class="top-bar-separator">|</span>
            <a href="assets/documents/tc.pdf" class="doc-link" target="_blank">T.C.</a>
            <span class="top-bar-separator">|</span>
            <a href="assets/documents/MANDATORY_PUBLIC_DISCLOSRE-2021-22.pdf" class="doc-link" target="_blank">Mandatory Disclosure</a>
            <span class="top-bar-separator">|</span>
            <a href="assets/documents/list-books.pdf" class="doc-link" target="_blank">List of Books</a>
        </div>
    </div>
</div>

<style>
.top-bar {
    background-color: var(--primary-color);
    border-bottom: 1px solid var(--primary-dark);
    padding: var(--spacing-sm) 0;
    font-size: var(--font-size-small);
    color: var(--white);
}

.top-bar-left,
.top-bar-right {
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
}

.top-bar-item {
    white-space: nowrap;
}

.top-bar-item a {
    color: var(--white);
}

.top-bar-item a:hover {
    color: var(--background-lighter);
}

.top-bar-separator {
    color: rgba(255, 255, 255, 0.4);
}

.btn-sm {
    padding: var(--spacing-xs) var(--spacing-md);
    font-size: var(--font-size-small);
}

.affiliation-badge {
    font-size: 11px;
    font-weight: var(--font-weight-bold);
    color: var(--background-lighter);
    letter-spacing: 0.5px;
    white-space: nowrap;
}

.doc-link {
    color: var(--white);
    text-decoration: none;
    font-size: var(--font-size-small);
    white-space: nowrap;
    transition: color 0.2s ease;
}

.doc-link:hover {
    color: var(--background-lighter);
}

/* Hide document links on mobile */
@media (max-width: 600px) {
    .top-bar-right {
        display: none !important;
    }
}

@media (max-width: 768px) {
    .top-bar {
        padding: var(--spacing-sm) 0;
    }

    .top-bar-left {
        flex-wrap: nowrap;
        gap: 6px;
    }

    .top-bar-item {
        font-size: 0.8rem;
    }

    .top-bar-separator {
        display: inline;
        margin: 0 4px;
    }

    .doc-link {
        font-size: 10px;
    }

    .affiliation-badge {
        font-size: 10px;
    }
}

    .top-bar-item {
        display: block;
        width: 100%;
    }
}

@media (max-width: 480px) {
    .top-bar-left,
    .top-bar-right {
        flex-direction: column;
        width: 100%;
        gap: var(--spacing-xs);
    }

    .top-bar-item {
        display: block;
        width: 100%;
    }

    .top-bar-separator {
        display: none;
    }

    .doc-link {
        display: block;
        font-size: 9px;
    }

    .affiliation-badge {
        display: block;
        font-size: 9px;
    }
}
</style>
