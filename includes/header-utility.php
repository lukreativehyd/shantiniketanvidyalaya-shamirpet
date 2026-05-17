<!-- Header Utility Bar -->
<div class="header-utility-bar">
    <div class="container">
        <div class="utility-links">
            <a href="documents/brochure.pdf" target="_blank" class="utility-link">
                <i class="fas fa-file-pdf"></i> Brochure
            </a>
            <span class="utility-divider">|</span>
            <a href="documents/calendar.pdf" target="_blank" class="utility-link">
                <i class="fas fa-calendar"></i> Calendar
            </a>
            <span class="utility-divider">|</span>
            <a href="documents/tc.pdf" target="_blank" class="utility-link">
                <i class="fas fa-certificate"></i> T.C.
            </a>
            <span class="utility-divider">|</span>
            <a href="documents/mandatory-disclosure.pdf" target="_blank" class="utility-link">
                <i class="fas fa-info-circle"></i> Mandatory Disclosure
            </a>
            <span class="utility-divider">|</span>
            <a href="documents/books.pdf" target="_blank" class="utility-link">
                <i class="fas fa-book"></i> List of Books
            </a>
        </div>
    </div>
</div>

<style>
.header-utility-bar {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
    padding: 12px 0;
    font-size: 0.85rem;
}

.header-utility-bar .container {
    display: flex;
    justify-content: center;
}

.utility-links {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
    justify-content: center;
}

.utility-link {
    color: #295192;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
    white-space: nowrap;
    display: flex;
    align-items: center;
    gap: 5px;
}

.utility-link:hover {
    color: #1d3574;
    text-decoration: underline;
}

.utility-link i {
    font-size: 0.9rem;
}

.utility-divider {
    color: #ccc;
    margin: 0 4px;
}

@media (max-width: 768px) {
    .header-utility-bar {
        padding: 8px 0;
    }

    .utility-links {
        gap: 4px;
    }

    .utility-link {
        font-size: 0.75rem;
    }

    .utility-divider {
        margin: 0 2px;
    }
}
</style>
